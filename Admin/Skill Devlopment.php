<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:admin_login.php");
    }

        $server_name = "localhost";
        $user_name = "u461470881_tcg2402";
        $password = "Team@2402";
        $database = "u461470881_TCG_DB";
        $data = mysqli_connect($server_name, $user_name, $password, $database);

    $sql = "SELECT *FROM Entrepreneurs";
    $result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="admin.css">
    <title>Document</title>
</head>
<body>
    <button>Export HTML table to CSV file</button>
    <table>
        <tr>
            <th>Sr No</th>
            <th>Registration Date</th>
            <th>Name</th>
            <th>Contact No</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Qualification</th>
            <th>City</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Expectation</th>
            <th>Status</th>
        </tr>
        <?php
        while ($info = $result->fetch_assoc()) {
        ?>
    
        <tr>
            <td>
                <?php echo"{$info['Sr_No']}";?> 
            </td>
             <td>
                <?php echo"{$info['Date_Joined']}";?>
            </td>
            <td> 
                <?php echo"{$info['Name']}";?> 
            </td>
            <td>
                <?php echo"{$info['Contact_No']}";?>
            </td>
            <td>
                <?php echo"{$info['Email']}";?>
            </td>
            <td style="width:7%">
                <?php echo"{$info['DOB']}";?>
            </td>
            <td> 
                <?php echo"{$info['Qualification']}";?>
            </td>
            <td>
                <?php echo"{$info['City']}";?>
            </td>
            <td> 
                <?php echo"{$info['Address']}";?>
            </td>
            <td>
                <?php echo"{$info['Gender']}";?>
            </td>
            <td> 
                <?php echo"{$info['Expectation']}";?>
            </td>
           
            <td>
                <?php echo"{$info['Status']}";?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    
        
        <script>
            function download_csv(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV FILE
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // We have to create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Make sure that the link is not displayed
    downloadLink.style.display = "none";

    // Add the link to your DOM
    document.body.appendChild(downloadLink);

    // Lanzamos
    downloadLink.click();
}

function export_table_to_csv(html, filename) {
	var csv = [];
	var rows = document.querySelectorAll("table tr");
	
    for (var i = 0; i < rows.length; i++) {
		var row = [], cols = rows[i].querySelectorAll("td, th");
		
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
		csv.push(row.join(","));		
	}

    // Download CSV
    download_csv(csv.join("\n"), filename);
}

document.querySelector("button").addEventListener("click", function () {
    var html = document.querySelector("table").outerHTML;
	export_table_to_csv(html, "Skill Devlopment.csv");
});
        </script>
</body>
</html>