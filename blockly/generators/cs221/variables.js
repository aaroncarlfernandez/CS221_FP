goog.provide('Blockly.cs221.vars');
goog.require('Blockly.cs221');

/**
 * Code generation stub for variable block
 * @param block
 * @returns {string}
 */
Blockly.cs221['variable'] = function(block) {
    var dropdown_variabletype = block.getFieldValue('variableType');
    var text_varname = block.getFieldValue('varName');
    var code = '\t' + dropdown_variabletype + ' ' +text_varname + '= 0;\n';
    return code;
};


/**
 * Code generation stub for parameter block
 * @param block
 * @returns {string}
 */
Blockly.cs221['parameter'] = function(block) {
  var text_parameter_name = block.getFieldValue('parameter-name');
  var dropdown_name = block.getFieldValue('NAME');
  var code = dropdown_name + ' ' + text_parameter_name + '$$'; //adding $$ to use it as a delimiter
  return code;
};
/**
 * Code generation stub for object variable block
 * @param block
 * @returns {string}
 */

Blockly.cs221['class-instance-variable'] = function(block) {
  var text_class_name = block.getFieldValue('class_name');
  var text_var_name = block.getFieldValue('variable_name');
  var code = text_class_name+' '+text_var_name+';\n';
  return code;
};
/**
 * Code generation stub for pointer variable block
 * @param block
 * @returns {string}
 */

Blockly.cs221['object-pointer'] = function(block) {
  var text_pointer_name = block.getFieldValue('pointer_name');
  var class_name = block.getFieldValue('class_name');
  var code = class_name+' '+'*'+text_pointer_name+';\n';
  return code;
};