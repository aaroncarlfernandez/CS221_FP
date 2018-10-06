/**
 * Description : This file is imported in HTML files.
 *               This is the main entry point for start generating the code blocks
 */


'use strict';
// Depending on the URL argument, render as LTR or RTL.
var rtl = (document.location.search == '?rtl');
var block = null;

function start() {
  Blockly.inject(document.getElementById('blocklyDiv'), 
      {
        path: '../', 
        toolbox: document.getElementById('toolbox')
      }
  );
  Blockly.addChangeListener(renderContent);
}

function currentChosenLanguage() {
	var content = document.getElementById('code4C');
	if(content == 'Undefined' || content == 'undefined' || content == null){
		return "c++";
	} else {
		return "c";
	}
}

function workspaceToCode() {
	console.log(currentChosenLanguage());
	if(currentChosenLanguage() == "c++"){
		var content = document.getElementById('code4Cplusplus');
		var code = Blockly.lisa.workspaceToCode();
		content.textContent = code;
	}else{
		var content = document.getElementById('code4C');
		var code = Blockly.cake.workspaceToCode();
		content.textContent = code;
  }
  return content.textContent;
}

function renderContent() {
  workspaceToCode();
}

function onSave() {
	var blob = new Blob([workspaceToCode()], {type: "text/plain;charset=utf-8"});
	if(currentChosenLanguage() == "c++"){
		saveAs(blob, "main.cpp");
	}else{
		saveAs(blob, "main.c");
	}
}


/**
 * Discard all blocks from the workspace.
 */
function discard() {
  var count = Blockly.mainWorkspace.getAllBlocks().length;
  if (count < 2 || window.confirm("Remove all blocks?")) {
    Blockly.mainWorkspace.clear();
    window.location.hash = '';
  }
}
