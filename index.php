<!DOCTYPE html>
<?php 
session_start();
$str = "";
$exit_status = -1;
if(isset($_SESSION['changed']) && ($_SESSION['changed'] == true)){
	unset($_SESSION['changed']);
}
else{
	// Include the compiler script according to the selected language.
	if(isset($_POST['compile'])){
		include_once('compilers/compiler_c.php');
		unset($_POST['compile']);
	}
}
?>

<html lang="en">
<head>
    <title>CS221 - Theory of Programming Languages Project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/styles/dracula.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/highlight.min.js"></script>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script>hljs.initHighlightingOnLoad();</script>
</head>

<body onload="start()">

<header>
	<img src="images/home/mapuasmall.png" class="slider-hill" alt="slider image" ALIGN="left">
	<div class="slide-text">
		<h1><strong>CS221 - Theory of Programming Language Project</h1></strong>
		<p>This has been submitted to Dr. Elcid Serrano as a partial fulfillment to the requirements of CS221 course.</p>
	</div>
</header>

<!--Home Slider-->
<section id="home-slider" style="border: 0px solid black">
    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
</section>
<!--End of home sliders-->

<!--Body-->
<section id="page-breadcrumb" >
    <div class="vertical-center sun">
        <div class="container">
            <div class="row" >
                <div class="action">
                    <div class="col-sm-12" id="scrollingPosition">
                        <h1 class="title"><strong>Drag 'N Drop C</strong</h1>
                        <p>Aaron Carl Fernandez, Davie Marie Sumagaysay, Earl Vic Hurna, Terence Ong, Sonam Sanghu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container" style="padding:10px;border:0px solid #4a4a4a; margin: 0px;float: none;margin-left: auto;margin-right:auto; width: 90%; box-shadow: 4px 4px 8px 2px #999999">
    <form action="index.php" method="post" role="form">
    <div class="row">
        <section class="col-md-8 col-xs-12" style="border:0px solid #4a4a4a; border-style: inset;padding: 0px;">
            <div id="blocklyDiv" class="col-md-12" style="height: 480px;margin: 0px;">
            </div>
            <xml id="toolbox">
                <category name="Variables">
                    <category name="Variable">
                        <block type="variables_declare"></block>
                        <block type="variables_get"></block>
                        <block type="variables_set"></block>
                    </category>
                    <category name="Pointer">
                        <block type="variables_pointer_declare"></block>
                        <block type="variables_pointer_get"></block>
                        <block type="variables_pointer_set">
                            <value name="VAR">
                                <block type="variables_pointer_get">
                                </block>
                            </value></block>
                        <block type="variables_pointer_&"></block>
                        <block type="variables_pointer_*"></block>
                    </category>
                    <category name="Array">
                        <block type="variables_array_declare"></block>
                        <block type="variables_array_get"></block>
                        <block type="variables_array_set"></block>
                    </category>
                </category>
                <category name="Arithmetics">
                    <block type="math_number"></block>
                    <block type="math_arithmetic"></block>
                    <block type="math_modulo"></block>
                </category>
                <category name="Loops">
                    <block type="controls_whileUntil"></block>
                    <block type="controls_doWhile"></block>
                    <block type="controls_for"></block>
                    <block type="controls_flow_statements"></block>
                </category>
                <category name="Logic">
                    <block type="controls_if"></block>
                    <block type="controls_switch"></block>
                    <block type="controls_switch_break"></block>
                    <block type="logic_compare"></block>
                    <block type="logic_operation"></block>
                    <block type="logic_negate"></block>
                    <block type="logic_boolean"></block>
                    <block type="logic_null"></block>
                    <block type="logic_ternary"></block>
                </category>
                <category name="Functions" custom="PROCEDURE">
                    <block type="procedures_defnoreturn"></block>
                    <block type="procedures_defreturn"></block>
                    <block type="procedures_ifreturn"></block>
                </category>
                </category>
                <category name="Structure" custom="STRUCTURE">
                    <block type="structure_define"></block>
                    <block type="structure_declare"></block>
                </category>
                <category name="Library">
                    <category name="Stdio">
                        <block type="library_stdio_printf"></block>
                        <block type="library_stdio_text"></block>
                        <block type='library_stdio_newLine'></block>
                        <block type="library_stdio_scanf"></block>
                    </category>
                    <category name="Stdlib">
                        <block type="library_stdlib_convert"></block>
                        <block type="library_stdlib_rand">
                            <value name="VAR">
                                <block type="library_stdlib_rand_scope">
                                    <value name="A">
                                        <block type="library_stdlib_number_forRandScope1"></block>
                                    </value>
                                    <value name="B">
                                        <block type="library_stdlib_number_forRandScope100"></block>
                                    </value>
                                </block>
                            </value>
                        </block>
                        <block type="library_stdlib_malloc">
                            <value name="VAR">
                                <block type="library_stdlib_arithmetic_forMalloc">
                                    <value name="A">
                                        <block type="library_stdlib_sizeof_forMalloc"></block>
                                    </value>
                                    <value name="B">
                                        <block type="library_stdlib_number_forMalloc"></block>
                                    </value>
                                </block>
                            </value>
                        </block>
                        <block type="library_stdlib_arithmetic_forMalloc">
                            <value name="A">
                                <block type="library_stdlib_sizeof_forMalloc"></block>
                            </value>
                            <value name="B">
                                <block type="library_stdlib_number_forMalloc"></block>
                            </value>
                        </block>
                        <block type="library_stdlib_free"></block>
                        <block type="library_stdlib_exit"></block>
                    </category>
                    <category name="String">
                        <block type="library_string_strlen"></block>
                        <block type="library_string_strcat"></block>
                        <block type="library_string_strcpy"></block>
                        <block type="library_string_strcmp"></block>
                    </category>
                    <category name="Math">
                        <block type="library_math_abs"></block>
                        <block type="library_math_trig"></block>
                        <block type="library_math_logs"></block>
                        <block type="library_math_pow"></block>
                        <block type="library_math_exp"></block>
                        <block type="library_math_sqrt"></block>
                        <block type="library_math_round"></block>
                        <block type="library_math_numcheck"></block>
                        <block type="library_math_numcompare"></block>
                    </category>
                    <category name="Time">
                        <block type="library_time_current"></block>
                        <block type="library_time_requiredTime"></block>
                    </category>
                </category>
                <category name="Others">
                    <block type='comment'>
                        <value name="VAR0">
                            <block type="library_stdio_text"></block>
                        </value>
                    </block>
                    <block type="library_stdio_text"></block>
                    <block type="math_number"></block>
                    <block type="define_declare"></block>
                    <block type="define_get"></block>
                </category>
            </xml>
        </section>
        <section class="col-md-4 col-xs-12" style="border:0px solid red ; float: left;padding: 0px;">
            <!--<form method="post" action="compilers/compiler_c.php">-->
            <div class="col-md-12 col-xs-12" style="height: 480px; overflow: auto;">
                <div id="code-wrapper" class="panel panel-default col-md-12" style="border: 0px solid black;height: 95%;width:100%">
                    <!--<div class="panel-heading">
                        <h3 class="panel-title"><strong>Generated Code</strong></h3>
                    </div>-->
                    <pre style="height: 420px;margin: 0px; border:2px solid #CCCCCC" class="panel-body">
                        <h3 class="panel-title"><strong>Generated Code</strong></h3>
                        <textarea rows="10" cols="68" name="program" class="program" id="code4C"></textarea>
                        <h3 class="panel-title"><strong>User Input</strong></h3>
                        <textarea rows="2" cols="68" name="input" class="form-control"></textarea>
                    </pre>
                </div>
            </div>
			<div class="col-md-6 col-xs-12">
				<button type="button" class="btn btn-primary btn-lg btn-block" onclick="onSave()">Save Code</button>
			</div>
            <div class="col-md-6 col-xs-12">
                <input type="submit" name="compile" class="btn btn-primary btn-lg btn-block" value="Compile!">
            </div>
            <!--</form>-->
        </section>
    </div>
    </form>
</div>
<footer id="footer">
</br>
<div class="result">
		<?php
			// if compiled successfully, show output.
			if($exit_status == 0){ ?>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h5>Compiled Successfully</h5>
				</div>
				<div class="panel-body">
					<?php echo $str; ?>
				</div>
			</div>
		<?php } ?>
		<?php
			// if there is any error, show error.
			if($exit_status == 1){ ?>
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h5>Failed to Compile!</h5>
				</div>
				<div class="panel-body">
					<?php echo $str; ?>
				</div>
			</div>
		<?php } ?>
		</div>
</footer>

<script>
    var blocklyArea = document.getElementById('blocklyArea');
    var blocklyDiv = document.getElementById('blocklyDiv');
</script>

<script type="text/javascript" src="blockly/blockly_uncompressed.js"></script>
<script type="text/javascript" src="blockly/blocks_compressed.js"></script>
<script type="text/javascript" src="blockly/msg/js/en.js"></script>
<script type="text/javascript" src="blockly/generators/cake.js"></script>
<script type="text/javascript" src="cake_compressed.js"></script>
<script   src="https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/FileSaver.js"></script>
<script type="text/javascript" src="js/prettify.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/lightbox.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/scrolling.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html>
