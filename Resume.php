      <style type="text/css">
        td{
          padding: 5px;
        }
      </style>
      
      <script type="text/javascript">
      function promptinfo(){
          var address=document.getElementById('address');
          var s1=document.getElementById('s1');
          var s2=document.getElementById('s2');
          var s3=document.getElementById('s3');
          address.value=s1.value+s2.value+s3.value;
        }
        </script>
      <form target="msg" method="post" class="am-form" action="Resume_PHP.php" enctype="multipart/form-data">
        <table>
            <tr>
              <td>Name(Chinese): </td>
              <td>
                <input type="text" name="chname" placeholder="Please enter your Chinese name" required>
              </td>
            </tr>
            <tr>
              <td>Ginder：</td><td><input type="radio" name="ginder" value="male" required>Male</input>
              <input type="radio" name="ginder" value="female" required>Female</input></td>
            </tr>
            <tr>
              <td>Date of Birth: </td>
              <td><input type="text" class="am-form-field" id='dateofb' readonly  name="birth" required></td>
            </tr>
            <tr>
              <td>Mobile Number: </td>
              <td><input type="tel" name="phone" required></td>
            </tr>
            <fieldset>
            <legend>Your Address:</legend>
            <tr>
              <td>Address: </td>
              <td><input type="text" name="add" required></td>
            </tr>
            <tr>
              <td>Province: <select class="select" name="province" id="s1" required><option></option></select></td>
              <td>City: <select class="select" name="city" id="s2" required><option></option></select></td>
              <td>Town: <select class="select" name="town" id="s3" required><option></option></select></td>
            </tr>
            </fieldset>
            <tr>
              <td>Career: </td>
              <td><input type="text" name="career" required></td>
            </tr>
            <tr>
              <td>Academic Degree: </td>
              <td><input type="text" name="degree" required></td>
            </tr>
            <tr>
              <td>Training Lab Track: </td>
              <td><select name="track" required>
                <option value="Java Track">Java Track</option>
                <option value="Dot Net Track">Dot Net Track</option>
                <option value="Open Source Track">Open Source Track</option>
                <option value="Combined Track">Combined Track</option>
              </select></td>
            </tr>
            <tr>
              <td>Details of Project: </td>
              <td><input type="textarea" cols="10" rows="5" name="project" required></td>
            </tr>
            <tr>
              <td>IT Skills: </td>
              <td><input type="text" name="skill" required></td>
            </tr>
            <tr>
              <td>Desired Job Location: </td>
              <td>City1: <select name="joblocation1" required><?php include('JobLocation.php'); ?></select></td>
              <td>City2: <select name="joblocation2" required><?php include('JobLocation.php'); ?></select></td>
              <td>City3: <select name="joblocation3" required><?php include('JobLocation.php'); ?></select></td>
            </tr>
            <tr>
              <td>Upload PDF/Ms-Word: </td>
              <td><input type="file" name="filepath"></td>
            </tr>
            <tr>
              <td><input id="address" name="address" type="hidden" value=""></td>
            </tr>
            <tr>
              <td><button onclick="submitfrom();" type="submit">Submit Resume</button></td>
            </tr> 
        </table>
      </form>
      <script>
        function submitfrom(){
        $("#my-alert").modal('toggle');
        }
        setup();preselect('山东省');promptinfo();
        $('#dateofb').datepicker({format: 'yyyy-mm-dd'});
      </script>
                