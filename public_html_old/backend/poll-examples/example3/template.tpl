<h2>{TITLE}</h2>

<ANSWERS>
	<ANSWERLINE>
		<label><input type="radio" name="{QUESTIONNAME}" value="{ANSWERID}" id="{ANSWERID}" />{ANSWER}</label>
	</ANSWERLINE>
	<div id="footer">
    {LINKRESULTS}
    <input name="btnvote" class="button" class="right" type="submit" value="Vote" />
    </div>
</ANSWERS>

<RESULTS>
	<RESULTLINE>
        <label>{ANSWER} <span class="small">{PERCENTVOTES}%</span></label>
		<div class="barempty"><div class="barfull" style="width:{PERCENTVOTES}%"></div></div>
	</RESULTLINE>
    <div id="footer">
    	{LINKPOLL}
    </div>
</RESULTS>