<div class="question">{TITLE}</div>

<ANSWERS>
	<ANSWERLINE>
		<label><input type="radio" name="{QUESTIONNAME}" value="{ANSWERID}" id="{ANSWERID}" />{ANSWER}</label>
	</ANSWERLINE>
	<div id="footer">
    {LINKRESULTS}
    <input name="btnvote" class="button" class="right" type="submit" value="" />
    </div>
</ANSWERS>

<RESULTS>
	<RESULTLINE>
        <label>{ANSWER}</label>
		<div class="barempty"><div class="barfull" style="width:{PERCENTVOTES}%"></div></div>
	</RESULTLINE>
    <div id="footer">
    	{LINKPOLL}
    </div>
</RESULTS>