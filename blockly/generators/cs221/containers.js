goog.provide('Blockly.cs221.containers');
goog.require('Blockly.cs221');
goog.require('Blockly.cs221.validator');


/**
 * Code generator stub for class-container block
 * @param block
 * @returns {string}
 */
Blockly.cs221['class-container'] = function(block) {
    Blockly.cs221.validator.init(block.workspace);
    var text_class_name = block.getFieldValue('class_name');
    var statements_class_body = Blockly.cs221.statementToCode(block, 'class_body');

    var code = '#incluse mbed.h \n\nclass ahmed '+ text_class_name +' {\n'+ statements_class_body +'}';

    var res = code.replace('$$CONSTRUCTOR_NAME$$', text_class_name);

    Blockly.cs221.validator.refresh();
    return res;
};

/**
 * Code generator stub for child-class-container block
 * @param block
 * @returns {string}
 */
Blockly.cs221['child-class-container'] = function(block) {

    var text_class_name = block.getFieldValue('class_name');
    var statements_class_body = Blockly.cs221.statementToCode(block, 'class_body');

    var parentClassName = this.parentBlock_.getFieldValue('class_name');
    var code = '\n\nclass '+ text_class_name +': '+ parentClassName +' {\n'+ statements_class_body +'}';
    var res = code.replace('$$CONSTRUCTOR_NAME$$', text_class_name);
    return res;
};


/**
 * Code generator stub for variable-container
 * @param block
 * @returns {string}
 */
Blockly.cs221['variable-container'] = function(block) {

    var dropdown_accessmodifire = block.getFieldValue('access-modifier');
    var statements_variables = Blockly.cs221.statementToCode(block, 'variables');
    var code = dropdown_accessmodifire +':\n' + statements_variables;
    return code;
};


/**
 * Code generator stub for method-container
 * @param block
 * @returns {string}
 */
Blockly.cs221['method-container'] = function(block) {

  var dropdown_access_modifier = block.getFieldValue('access-modifier');
  var statements_inputs = Blockly.cs221.statementToCode(block, 'inputs');
  var code = dropdown_access_modifier +':\n' + statements_inputs;

  return code;
};

