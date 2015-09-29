<div class="row"><h3>{TITLE}</h3></div>

<ANSWERS>
<div class="radio">
	<ANSWERLINE>
    
  <label>
		<input type="radio" name="{QUESTIONNAME}" value="{ANSWERID}" id="{ANSWERID}" />{ANSWER}</label>
	</ANSWERLINE>
    </div>
	<div id="footer">
    <input name="btnvote" class="btn btn-default" class="right" type="submit" value="Answer" />
    {LINKRESULTS}
    </div>
</ANSWERS>

<RESULTS>
	<RESULTLINE>
        <label>{ANSWER}: {PERCENTVOTES}</label>
	</RESULTLINE>
    <div id="footer">
    	{LINKPOLL}
    </div>
</RESULTS>