<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>

<html>
<script src="contacts.js"></script>
<script src="code.js"></script>
<script>var useri = <?php echo json_encode($id); ?>;</script>
<head>
    <title> User Home Page </title>
    <link href="homeStyle.css" rel="stylesheet">
    <script type="text/javascript">
	    document.addEventListener('DOMContentLoaded', function() 
	    {
	    	readCookie();
	    }, false);
	</script>
</head>
<body>
    <h2 style="font-family: monospace;"> Your Contact List </h2>

    <form id="form" role="search">
        <input type="search" id="input" name="q" onkeyup="searchForContacts()" placeholder="Search Contact..." style="font-family: monospace;">
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>
        <span id="contactSearchResults"></span>
        
    </form>


    <div id="addDiv">
        <button onclick="openForm(this.parentNode.nextElementSibling)" id="popupButton" value="Add Contact" style="font-family: monospace;"> Add Contact </button>
    </div>
    <div class="form-popup" id="add">
        <input type="text" id="firstname" placeholder="Enter First Name" style="font-family: monospace;" required><br>
       
        <input type="text" id="lastname" placeholder="Enter Last Name" style="font-family: monospace;" required><br>
   
        <input type="text" id="phone" placeholder="Enter Phone Number" style="font-family: monospace;" required><br>
        
        <input type="text" id="email" placeholder="Enter Email" style="font-family: monospace;" required><br>
       
        <div id="addContactButtons">
        <button type="submit" id="actionButton" onclick="var tmp = addContact(this.parentNode.parentNode); if(tmp){location.reload()};"class="btn">Add Contact</button>
            <span id="contactAddResult"></span>
            <button type="button" id="closeButton" class="btn cancel" onclick="closeForm(this.parentNode.parentNode)">Close</button>
        </div>
    </div>

    <div id="deleteDiv">
        <button onclick="openForm(this.parentNode.nextElementSibling)" id="popupButton" value="Delete Contact" style="font-family: monospace;"> Delete Contact </button>
    </div>
    <!-- The form -->
    <div class="form-popup" id="delete">
    <input type="text" id="ID" placeholder="Enter Contact ID for Deletion" style="font-family: monospace;" required><br>
        <div id="deleteContactButtons">
            <button type="submit" id="actionButton" onclick="var tmp2 = deleteContact(this.parentNode.parentNode); if(tmp2){location.reload()};"class="btn">Delete</button>
            <span id="contactDeleteResult"></span>
            <button type="button" id="closeButton" class="btn cancel" onclick="closeForm(this.parentNode.parentNode)">Close</button>
        </div>
    </div>

    <div id="updateDiv">
        <button onclick="openForm(this.parentNode.nextElementSibling);" id="popupButton" value="Delete Contact" class="btn">Edit Contact</button>
    </div>
    <div class="form-popup" id="update">
        <input type="text" id="ID2" placeholder="Enter Contact ID to Update" style="font-family: monospace;" required><br>
        <div id="updateContactButtons">
            
            <button onclick="var tmp = checkContact(this.parentNode.previousElementSibling.previousElementSibling); if(tmp){openForm(this.nextElementSibling.nextElementSibling.nextElementSibling)}" id="actionButton">Edit Contact</button>
            <span id="contactUpdateResult"></span>
            <button type="button" id="closeButton" class="btn cancel" onclick="closeForm(this.parentNode.parentNode)">Close</button>
        
            <div class="form-popup" id="updateFields">
                <input type="text" id="firstname2" placeholder="Enter First Name" style="font-family: monospace;" required><br>
       
                <input type="text" id="lastname2" placeholder="Enter Last Name" style="font-family: monospace;" required><br>
  
                <input type="text" id="email2" placeholder="Enter Email" style="font-family: monospace;" required><br>
       
                <input type="text" id="phone2" placeholder="Enter Phone Number" style="font-family: monospace;" required><br>
                <div id="finalUpdateButtons">
                    <button id="actionButton" onclick="var tmp = updateContact(this.parentNode.parentNode); if(tmp){location.reload()};"class="btn">Update Contact</button>
                    <span id="finalUpdateResult"></span>
                    <button type="button" id="closeButton" class="btn cancel" onclick="closeForm(this.parentNode.parentNode)">Close</button>
                </div>
            </div>

        </div>
    </div>
    

    <div style="overflow-y: auto;">
        <table>
            <thead>
                <tr>
                    <th style="font-family: monospace;">ID</th>
                    <th style="font-family: monospace;">First Name</th>
                    <th style="font-family: monospace;">Last Name</th>
                    <th style="font-family: monospace;">Email Address</th>
                    <th style="font-family: monospace;">Phone Number</th>
                </tr>
            </thead>
            <tbody id="contactTableBody">
                
            </tbody>
        </table>
    </div>
    
    <script>
        showContacts(useri);
    </script>
        
    
        
    <div id="logoutDiv">
        <button type="button" id="logoutButton" class = "buttons" style="font-family: monospace;" onclick="Logout();"> Logout </button>
    </div>

    <div id="userInfoDiv">
        <span id="userEmail"></span>
    </div>

    

</body>

</html>