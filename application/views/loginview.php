<html>

<head>
    <title>Login View </title>
</head>

<body>
    <?php echo form_open('login/check'); ?>
    <table border='0'>
        <tr align='center'>
            <td colspan='2'><b>Welcome To Linux For You</b></td>
            </tr>
        <tr>
            <td>User Name: </td>
            <td><input type='text' name='username' id='username' /></td>
            </tr>
        <tr>
            <td>Password: </td>
            <td><input type='password' name='password' id='password' /></td>
           </tr>
       <tr>
           <td colspan='2' align='center' style='padding-left:40px'><?php echo form_submit('submit', 'Submit') ?>
               <input type='button' value=Cancel onClick='window.location.reload();' /></td>
           </tr>
    </table>
    <?php echo form_close() ?>
    <?php echo validation_errors(); ?>
</body>

</html>

<!-- Here’s the explanation:

1.form_open('functionname') will create a form with the POST method by default. On submission, it will send the form data to the specified function (here, the check function of the controller file).
2.form_submit('submit','Submit) will create and perform the submit button action. Arguments passed are type and value.
3.close() marks the end of the form.
4.validation_errors() will print all validation errors set in the controller file.
5.On cancellation, it will simply reload the page. -->