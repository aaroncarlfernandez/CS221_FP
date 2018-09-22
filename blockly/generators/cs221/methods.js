/**
 * Code generation stub for method block
 * @method block
 * @returns {string}
 */
Blockly.cs221['method'] = function(block) {
    var returnType = block.getFieldValue('RETURN_TYPE');
    var methodName = block.getFieldValue('METHOD_NAME');
    var branch = Blockly.cs221.statementToCode(block, 'NAME');
    var params = branch.split('$$');
    if(params.length > 2) {
        for(var i = 0; i < params.length - 3; i++) {
            params[i] = params[i] + ', ';
        }
        branch = params.join();

    } else {
        branch = params.join();
    }
    // removing the starting indentation and last comma
    branch = branch.substring(2, branch.lastIndexOf(','));
    var code = '';
    code += returnType;
    code += ' ' + methodName;
    code += '(' + branch +') {';
    code += (returnType && returnType !== 'void') ? '\n\treturn -1;\n': '';
    code += '}\n';
    return code;
};