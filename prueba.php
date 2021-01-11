<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 23/07/15
 * Time: 01:48 PM
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
                    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

	    <script type="text/javascript">
    $(document).ready(function() {
        $('#btnAdd').click(function() {
            var num		= $('.clonedInput').length;
            var newNum	= new Number(num + 1);

            var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

            newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
            $('#input' + num).after(newElem);
            $('#btnDel').attr('disabled','');

            if (newNum == 5)
                $('#btnAdd').attr('disabled','disabled');
        });

        $('#btnDel').click(function() {
            var num	= $('.clonedInput').length;

            $('#input' + num).remove();
            $('#btnAdd').attr('disabled','');

            if (num-1 == 1)
                $('#btnDel').attr('disabled','disabled');
        });

        $('#btnDel').attr('disabled','disabled');
    });
	</script>
</head>

<body>

<form>
	<div id="input1" style="margin-bottom:4px;" class="clonedInput">
Name: <input type="text" name="name1" id="name1" />
	</div>

	<div>
		<input type="button" id="btnAdd" value="add another name" />
		<input type="button" id="btnDel" value="remove name" />
	</div>
</form>

</body>
</html>