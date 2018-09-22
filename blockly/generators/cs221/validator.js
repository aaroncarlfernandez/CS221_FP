goog.provide('Blockly.cs221.validator');

var workspace;
var colors = ['red', 'green', 'yellow'];

Blockly.cs221.validator.init = function(pWorkspace) {
    if(!workspace) {
        workspace = pWorkspace;
    }
}

Blockly.cs221.validator.refresh = function () {
    var classes = workspace.getAllBlocks().filter(function (block) {
        return block.type == 'class-container';
    });

    var classDropDowns = workspace.getAllBlocks().filter(function (block) {
        return block.type == 'class-instance-variable';
    })
    var classNameList = [];
    for(var i in classes) {
        classNameList.push(classes[i].getFieldValue('class_name'));
    }

    if(classDropDowns) {
        for(var z in classDropDowns) {
            classDropDowns[z].inputList[0].fieldRow[1].menuGenerator_ = [];
        }
        for(var i in classNameList) {
            for(var x in classDropDowns) {
                classDropDowns[x].inputList[0].fieldRow[1].menuGenerator_.push([classNameList[i], classNameList[i]]);
            }
        }

    }
};