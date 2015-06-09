<?php
error_reporting(E_ALL);
ob_start();

// Include not file_get_contents workaround
include("File.php");

// Display a poll
function Poll($id, $template="template.tpl", $data="data.xml"){
	$Poll = new Poll($template, $data);
	return $Poll->Parse($id);
}

if(!defined("NEWLINE")){
	define("NEWLINE", "\n");
}

class Poll{
	
	
	private $_questions = array();	
	private $_template = array();
	private $_best_votes = array();
	private $_best_answer = array();
	private $_data;

	public function __construct($template="template.tpl", $data="data.xml", $admin=false){
		
		// If file !exists
		if(!file_exists($data)){
			$fileHandle = fopen($data, 'w') or die("Can't open file");
			fclose($fileHandle);

		}
		
		// If the file is empty
		if(filesize($data) == 0){
			$this->Add("New poll");
			$this->saveData($data);
		}
		
		// Load data
		$this->loadData($data);
		
		if(!$admin){
			// Load template
			$this->loadTemplate($template);
		}
		
		// Set data file
		$this->_data = $data;
		
		// Handle post
		if($this->handlePost()){
			// Save data
			$this->saveData($data);
		}
		
	}
	
	private function loadData($file){
		
		if(file_exists($file)){
			$Xml = simplexml_load_file($file);
		}else{
			trigger_error("File $file is not found", E_USER_ERROR);
			exit;
		}

		// Loop polls
		foreach($Xml->polls->poll as $poll){
			$Question = new Poll_Question();
			$Question->id = trim($poll['id']);
			$Question->title = trim($poll->title);
			foreach($poll->answers->answer as $answer){
				$Question->answers[trim($answer['id'])] 	= trim($answer);
				$Question->votes[trim($answer['id'])] 		= trim($answer['votes']);
				if(!isset($this->_best_votes[$Question->id]) || trim($answer['votes']) > $this->_best_votes[$Question->id]){
					$this->_best_votes[$Question->id] = trim($answer['votes']);
					$this->_best_answer[$Question->id] = trim($answer);
				}
			}
			$Question->voted = explode(",", trim($poll->voted));
			$this->_questions[$Question->id] = $Question;
		}
		
	}
	
	public function Save(){
		$this->saveData($this->_data);
	}
	
	private function saveData($file){
		
		$format = '<?xml version="1.0" encoding="utf-8"?><data><polls>%s</polls></data>';
		
		// Loop through polls
		$question_xml = "";
		foreach($this->_questions as $Question){
			$question_xml .= sprintf('<poll id="%s">', $Question->id);
			$question_xml .= sprintf('<title>%s</title>', htmlspecialchars($Question->title, ENT_QUOTES));
			$question_xml .= '<answers>';
			if(is_array($Question->answers)){
				foreach ($Question->answers as $answer_id => $answer_text){
					$question_xml .= sprintf('<answer id="%s" votes="%s">%s</answer>', $answer_id, $Question->votes[$answer_id], htmlspecialchars($answer_text, ENT_QUOTES));
				}
			}
			$question_xml .= '</answers>';
			if(!is_array($Question->voted)) $Question->voted = array();
			$question_xml .= sprintf('<voted>%s</voted></poll>', implode(",", $Question->voted));
		}
		
		$result = sprintf($format, $question_xml);
		
		file_put_contents($file, $result);
		
	}
	
	private function loadTemplate($file){
		if(file_exists($file)){
			$this->_template = file_get_contents($file);
		}else{
			trigger_error("Template file $file is not found", E_USER_ERROR);
			exit;
		}
	}
	
	private function currentUrl(){
		$url = 'http';
		if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") $url .= 's';
		$url .= '://';
		if($_SERVER["SERVER_PORT"] != "80"){
			$url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
		}else{
			$url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}
		return $url;
	}
	
	public function Parse($id){
		if(!isset($this->_questions[$id])){
			trigger_error("Poll $id doesn't exist", E_USER_WARNING);
			return "The selected Poll doesn't exist.";
		}
		
		// Select current poll
		$Question = $this->_questions[$id];
		
		// Replace normal strings
		$currentUrl = str_replace(array('?poll' . $Question->id . '=results', '&poll' . $Question->id . '=results', '?poll' . $Question->id . '=vote', '&poll' . $Question->id . '=vote'), '', $this->currentUrl());
		$seperator = strpos($currentUrl, "?") == '' ? "?" : "&";
		$result = str_replace("{TITLE}", htmlspecialchars(stripslashes($Question->title)), $this->_template);
		$result = str_replace("{LINKRESULTS}", '<noscript><a href="' . $currentUrl . $seperator . 'poll' . $Question->id . '=results">View Results</a></noscript><a href="javascript:pollresult' . $Question->id . '();" id="pollresultlink' . $Question->id . '" style="display:none">View Results</a>', $result);
		$result = str_replace("{LINKPOLL}", '<noscript><a href="' . $currentUrl . $seperator . 'poll' . $Question->id . '=vote">View Poll</a></noscript><a href="javascript:pollquestions' . $Question->id . '();" id="pollvotelink' . $Question->id . '" style="display:none">View Poll</a>', $result);
		
		// Loop results
		preg_match_all('/\<RESULTLINE\>(.*?)\<\/RESULTLINE\>/s', $result, $matches, PREG_PATTERN_ORDER);
		$result_template 	= trim($matches[1][0]);
		$result_html 		= "";
		$total_votes 		= $Question->TotalVotes();

		// Replace total votes var and best votes/answer
		if(!isset($this->_best_votes[$id])) $this->_best_votes[$id] = "";
		if(!isset($this->_best_answer[$id])) $this->_best_answer[$id] = "";
		$result = str_replace(array("{TOTALVOTES}", "{TOPVOTES}", "{TOPANSWER}"), array($total_votes, $this->_best_votes[$id], $this->_best_answer[$id]), $result);
		
			foreach ($Question->votes as $answer_id => $votes){
				$percentvotes = $total_votes > 0 ? floor($votes) : 0;
				$result_html .= str_replace(
										array('{VOTES}', '{ANSWER}', '{PERCENTVOTES}'), 
										array($votes, htmlspecialchars(stripslashes($Question->answers[$answer_id])), $percentvotes), $result_template) . "\n";
			}
			$result = preg_replace('/\<RESULTLINE\>(.*?)\<\/RESULTLINE\>/s', $result_html, $result, PREG_PATTERN_ORDER);
			
			// Replace answers part
			$state = $Question->HasVoted() ? ' style="display:none;"' : '';
			if(isset($_GET['poll' . $Question->id])){
				$state = $_GET['poll' . $Question->id] == 'vote' ? '' : ' style="display:none;"';
			}
			$result = str_replace("<ANSWERS>", '<div id="pollanswers' . $Question->id . '" ' . $state . '><form action="" method="post" name="frmpoll' . $Question->id . '">', $result);
			$result = str_replace("</ANSWERS>", '<input name="currentpoll" type="hidden" value="' . $Question->id . '" /></form></div>', $result);
			
			// Loop answers
			preg_match_all('/\<ANSWERLINE\>(.*?)\<\/ANSWERLINE\>/s', $result, $matches, PREG_PATTERN_ORDER);
			$answer_template 	= trim($matches[1][0]);
			$answer_html 		= "";
			foreach ($Question->answers as $answer_id => $answer_text){
				$answer_html .= str_replace(
										array('{QUESTIONNAME}', '{ANSWERID}', '{ANSWER}'), 
										array("vote", "answer_" . $answer_id, htmlspecialchars(stripslashes($answer_text))), $answer_template) . "\n";
			}
			$result = preg_replace('/\<ANSWERLINE\>(.*?)\<\/ANSWERLINE\>/s', $answer_html, $result, PREG_PATTERN_ORDER);
			
			// Replace results part
			$state = $Question->HasVoted() ? '' : ' style="display:none;"';
			if(isset($_GET['poll' . $Question->id])){
				$state = $_GET['poll' . $Question->id] == 'results' ? '' : ' style="display:none;"';
			}
			$result = str_replace("<RESULTS>", '<div id="pollresults' . $Question->id . '" ' . $state . '>', $result);
			$result = str_replace("</RESULTS>", '</div>', $result);
			
			// Add show results scripts
			$script = '<script>document.getElementById("pollresultlink' . $Question->id . '").style.display=\'\';
			function pollresult' . $Question->id . '(){ document.getElementById(\'pollanswers' . $Question->id . '\').style.display="none"; document.getElementById(\'pollresults' . $Question->id . '\').style.display="block"; }';
			$script .= 'document.getElementById("pollvotelink' . $Question->id . '").style.display=\'\';
			function pollquestions' . $Question->id . '(){ document.getElementById(\'pollanswers' . $Question->id . '\').style.display="block"; document.getElementById(\'pollresults' . $Question->id . '\').style.display="none"; }</script>';
			$result .= $script;
		return $result;
	}
	
	public function &GetQuestions(){
		return $this->_questions;
	}
	
	public function Add($title){
		
		$Poll = new Poll_Question();
		
		// Get new id
		$highest = 0;
		foreach($this->_questions as $Question){
			if($Question->id > $highest){
				$highest = $Question->id;
			}
		}
		$Poll->id = $highest+1;
		$Poll->title = $title;
		$Poll->AddAnswer();
		
		// Add new poll to the array
		$this->_questions[] = $Poll;
		
		// Return new poll id
		return $Poll->id;
		
	}
	
	public function Remove($id){
		if(isset($this->_questions[$id])){
			unset($this->_questions[$id]);
		}
	}
	
	public function AdminSave($array){
		foreach($array as $key => $value){
			$parts = explode("_", $key);
			if(count($parts)>2){
				if(is_numeric($parts[1]) && is_numeric($parts[2]) && isset($this->_questions[$parts[1]])){
					$Question = $this->_questions[$parts[1]];
					switch($parts[0]){
						case "answer":
							$Question->SetAnswer($parts[2], $value);
							break;
						case "vote";
							$Question->SetVote($parts[2], $value);
							break;
					}
				}
			}else{
				if(isset($parts[1]) && is_numeric($parts[1]) && isset($this->_questions[$parts[1]])){
					$Question = $this->_questions[$parts[1]];
					switch($parts[0]){
						case "title":
							$Question->title = $value;
							break;
					}
				}
			}
		}
		$this->Save();
	}
	
	private function handlePost(){
		if(isset($_POST['currentpoll']) && isset($_POST['vote'])){
			$currentpoll = $_POST['currentpoll'];
			$vote_id = end(explode("_", $_POST['vote']));
			$this->_questions[$currentpoll]->Vote($vote_id);
			$this->Save();
			return true;
		}
		return false;
	}
	
}

class Poll_Question{
	public $id;
	public $title;
	public $answers;
	public $votes = array();
	public $voted;
	public function Vote($answer_id){
		if(isset($this->answers[$answer_id]) && !$this->HasVoted()){

			// Get cookie
			$cookie = array();
			if(isset($_COOKIE['poll'])){
				$cookie = explode(",", $_COOKIE['poll']);
			}
			
			// Add to cookie
			if(!in_array($this->id, $cookie)){
				$cookie[] = $this->id;
				setcookie("poll", implode(",", $cookie));
			}
			
			// Add ip to voted
			$ip = $_SERVER['REMOTE_ADDR'];
			if(!in_array($ip, $this->voted)){
				$this->voted[] = $_SERVER['REMOTE_ADDR'];
			}
			
			$this->votes[$answer_id]++;
		}
	}
	
	public function HasVoted(){
		
		// Get cookie value
		$cookie = array();
		if(isset($_COOKIE['poll'])){
			$cookie = explode(",", $_COOKIE['poll']);
		}

		// Check if ip has voted yet
		$ip = $_SERVER['REMOTE_ADDR'];
		if(!in_array($ip, $this->voted) && !in_array($this->id, $cookie)){
			return FALSE;
		}
		
		// Set cookie back
		if(in_array($ip, $this->voted) && !in_array($this->id, $cookie)){
			setcookie("poll", $this->id);
		}
		
		return TRUE;
		
	}
	
	public function AddAnswer($answer=""){
		$answer_id = 1;
		if(is_array($this->answers)){
			$current_id = 0;
			foreach($this->answers as $id => $text){
				$current_id = $id;
			}
			$answer_id = $current_id+1;
		}
		
		$this->answers[$answer_id] = $answer;
		$this->votes[$answer_id] = 0;
	}
	
	public function SetVote($answer, $votes){
		if(isset($this->votes[$answer]) && is_numeric($votes)){
			$this->votes[$answer] = $votes;
		}
	}
	
	public function SetAnswer($answer_id, $value){
		if(isset($this->answers[$answer_id])){
			$this->answers[$answer_id] = $value;
		}
	}
	
	public function RemoveAnswer($answer_id){
		if(isset($this->answers[$answer_id])){
			unset($this->answers[$answer_id]);
		}
	}
	
	public function TotalVotes(){
		return array_sum($this->votes);
	}
	
}