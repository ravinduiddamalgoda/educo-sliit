<?php
$css = file_get_contents(__DIR__ .'/../src/css/codeBlock.css');
function code($code="", $language = "Code", $icon = ""){
	if(empty($icon)){
		if ($language == "JavaScript"){
			$icon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
			<path fill="currentColor" d="M 6.667969 4 C 5.207031 4 4 5.207031 4 6.667969 L 4 43.332031 C 4 44.792969 5.207031 46 6.667969 46 L 43.332031 46 C 44.792969 46 46 44.796875 46 43.332031 L 46 6.667969 C 46 5.207031 44.796875 4 43.332031 4 Z M 6.667969 6 L 43.332031 6 C 43.703125 6 44 6.296875 44 6.667969 L 44 43.332031 C 44 43.703125 43.703125 44 43.332031 44 L 6.667969 44 C 6.296875 44 6 43.703125 6 43.332031 L 6 6.667969 C 6 6.296875 6.296875 6 6.667969 6 Z M 23 23 L 23 35.574219 C 23 37.503906 22.269531 38 21 38 C 19.671875 38 18.75 37.171875 18.140625 36.097656 L 15 38 C 15.910156 39.925781 18.140625 42 21.234375 42 C 24.65625 42 27 40.179688 27 36.183594 L 27 23 Z M 35.453125 23 C 32.046875 23 29.863281 25.179688 29.863281 28.042969 C 29.863281 31.148438 31.695313 32.617188 34.449219 33.789063 L 35.402344 34.199219 C 37.140625 34.960938 38 35.425781 38 36.734375 C 38 37.824219 37.171875 38.613281 35.589844 38.613281 C 33.707031 38.613281 32.816406 37.335938 32 36 L 29 38 C 30.121094 40.214844 32.132813 42 35.675781 42 C 39.300781 42 42 40.117188 42 36.683594 C 42 33.496094 40.171875 32.078125 36.925781 30.6875 L 35.972656 30.28125 C 34.335938 29.570313 33.625 29.109375 33.625 27.964844 C 33.625 27.039063 34.335938 26.328125 35.453125 26.328125 C 36.550781 26.328125 37.253906 26.792969 37.90625 27.964844 L 40.878906 26.058594 C 39.625 23.84375 37.878906 23 35.453125 23 Z"></path>
			</svg>';
		}else if($language == "HTML"){
			$icon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
<path fill="currentColor" d="M 9 7 L 12 41 L 26 45 L 40 41 C 41 29.667 42 18.333 43 7 L 9 7 z M 11.183594 9 L 40.816406 9 L 38.128906 39.455078 L 26 42.919922 L 13.871094 39.455078 L 11.183594 9 z M 18.550781 15 L 17.589844 27 L 30.580078 27 L 30.169922 32 L 26 32.619141 L 21.880859 32 L 21.699219 30 L 17.839844 30 L 18.230469 35 L 25.990234 37 L 33.759766 35 L 34.75 23 L 22.089844 23 L 22.410156 19 L 30.769531 19 L 31 21 L 34.699219 21 L 34 15 L 18.550781 15 z"></path>
</svg>';
		}else if($language == "CSS"){
			$icon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
<path fill="currentColor" fill-rule="evenodd" d="M 39 40 L 25 44 L 11 40 L 8 6 L 42 6 C 41 17.332031 40 28.667969 39 40 Z M 39.816406 8 L 10.183594 8 L 12.871094 38.453125 L 25 41.921875 L 37.128906 38.453125 Z M 16.800781 28 L 20.800781 28 L 20.898438 30.5 L 25 31.898438 L 29.101563 30.5 L 29.398438 26 L 20.601563 26 L 20.398438 22 L 29.601563 22 L 29.898438 18 L 16.101563 18 L 15.800781 14 L 34.101563 14 L 33.601563 22 L 32.898438 33.5 L 25 36.101563 L 17.101563 33.5 Z"></path>
</svg>';
		}else if($language == "PHP"){
			$icon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
			<path fill="currentColor" d="M 25 12 C 18.507813 12 12.621094 13.359375 8.273438 15.628906 C 3.925781 17.898438 1 21.167969 1 25 C 1 28.832031 3.925781 32.101563 8.273438 34.371094 C 12.621094 36.640625 18.507813 38 25 38 C 31.492188 38 37.378906 36.640625 41.726563 34.371094 C 46.074219 32.101563 49 28.832031 49 25 C 49 21.167969 46.074219 17.898438 41.726563 15.628906 C 37.378906 13.359375 31.492188 12 25 12 Z M 25 14 C 31.210938 14 36.824219 15.324219 40.800781 17.402344 C 44.777344 19.476563 47 22.203125 47 25 C 47 27.796875 44.777344 30.523438 40.800781 32.597656 C 36.824219 34.675781 31.210938 36 25 36 C 18.789063 36 13.175781 34.675781 9.199219 32.597656 C 5.222656 30.523438 3 27.796875 3 25 C 3 22.203125 5.222656 19.476563 9.199219 17.402344 C 13.175781 15.324219 18.789063 14 25 14 Z M 22.507813 16 L 20 28 L 22.625 28 L 23.890625 22 L 25.988281 22 C 26.65625 22 27.101563 22.109375 27.308594 22.332031 C 27.511719 22.554688 27.554688 22.976563 27.4375 23.582031 L 26.480469 28 L 29.144531 28 L 30.183594 23.222656 C 30.40625 22.078125 30.238281 21.238281 29.683594 20.726563 C 29.117188 20.207031 28.121094 20 26.636719 20 L 24.296875 20 L 25.128906 16 Z M 11 20 L 8.972656 31 L 11.617188 31 L 12.144531 28 L 13.792969 28 C 17.238281 28 19.113281 27.203125 19.8125 24.246094 C 20.414063 21.703125 18.875 20 16.332031 20 Z M 32 20 L 29.972656 31 L 32.617188 31 L 33.144531 28 L 34.792969 28 C 38.238281 28 40.113281 27.203125 40.8125 24.246094 C 41.414063 21.703125 39.875 20 37.332031 20 Z M 13.273438 22 L 15.332031 22 C 17.042969 22 17.402344 22.769531 17.3125 23.625 C 17.082031 25.832031 15.707031 26 14.230469 26 L 12.515625 26 Z M 34.273438 22 L 36.332031 22 C 38.042969 22 38.402344 22.769531 38.3125 23.625 C 38.082031 25.832031 36.707031 26 35.230469 26 L 33.515625 26 Z"></path>
			</svg>';
		}else {
			$icon = '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABx0lEQVR4nO2Yv0sDMRiGHxEVdNEOdhNXoWMXXfQPsKvuCo46iu5WHbt3ctJZtw5utrYIIqK4dFMKDk4K4o9I4Ksc6nmndzmSkhcyHEneL0+/9MvlwMvLmAaBXeAOUI61W2BbGNixYEFJWxmh0g/TuKeZQGY+qVyV6q7fg9iaEeV4o+dAXJXyIJZJ+YwkUD/QBM5xPCPzEqvtOsiRxNpwGWQCeAWegbzLIGWJs5+yr8oSRF98OhJn1jaQEnAN3HRvaL9oUWJcAX1f+vTzKXAhnpmBFIBaYN6ZlNXfdCxjV0P6GwG/msQwBpIDKsCLjH8A1oGhiHlTwDvwBIyFjBkAVoB78X4D9mIWhdggYUHGiaeKzKsa+rFUXJAkaR+Wxei5xQTbt54GSD0ByLLMa/E3FUyAJNm/LZmzFBMgZ3Jr/TdIMTBuJMI7yf9QpVV+9Rnwk6rSr+Gj1Myy/IYdiCffemAUeJSyq8tvlBriVcKyV5Q18dQHoWkpkyCX4rmAwyBz4teJ8Q5mNciB+G2RjZQJkLxcnHT5nMRhkE3xOiQ7KRMgbfHSHxmcBqlLi7qf4PKd3ZSUB7FMymfEMqmezYhyvNEzIF5epK8Po/83ENea8bsAAAAASUVORK5CYII=">';
		}
	}

	return '
<div class="codeBlockContainer">
	<div class="codeHeader">
		<span class="codeLanguage"><span class="languageIcon">'.$icon.'</span><span class="codeName">'.$language.'</span></span>
		<button class="copyCode"> 
		<span class="copy-button-icon material-icons">
			content_copy
		</span>
		</button>
    </div>
	<div class="codeBody">
<pre>
<code id="CodeBlock" class="CodeBlock prettyprint">'.str_replace('>', '&gt;', str_replace('<', '&lt;', $code)).'</code>
</pre>
	</div>
</div>
';
}


echo '
<link href="https://cdn.rawgit.com/google/code-prettify/master/styles/sunburst.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">';
echo "<style>
$css hello
</style>";
echo '<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>';

echo '<script>
	document.addEventListener("DOMContentLoaded", () => {
		var buttons = document.getElementsByClassName("copyCode");
		for (let i = 0; i < buttons.length; i++) {
				buttons[i].addEventListener("click", function() { copyCode(i); });
		}
	});
	function copyCode(index) {
		var codeBlocks = document.getElementsByClassName("CodeBlock");
		let text = codeBlocks[index].textContent;
		var textarea = document.createElement("textarea");
		textarea.value = text;
		document.body.appendChild(textarea);

		textarea.select();
		document.execCommand("copy");

		document.body.removeChild(textarea);

	}

	document.addEventListener("DOMContentLoaded", () => {
		let codeBlocks = document.getElementsByClassName("CodeBlock");

		for (let i = 0; i < codeBlocks.length; i++) {
			let numLines = codeBlocks[i].textContent.split("\n").length;

			let lineNumbers = document.createElement("div");
			lineNumbers.classList.add("lineNum");
			lineNumbers.style.float = "left";
			lineNumbers.style.textAlign = "right";
			lineNumbers.style.marginRight = "1em";
	
			for (let j = 1; j <= numLines; j++) {
				let lineNumber = document.createElement("div");
				lineNumber.textContent = j;
				lineNumbers.appendChild(lineNumber);
			}
	

			codeBlocks[i].parentNode.insertBefore(lineNumbers, codeBlocks[i]);
		}
	});</script>';


?>
<style> 
	#
</style>