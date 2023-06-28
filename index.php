<?php


$conn = mysqli_connect("localhost", "root", "", "citypopulation") or die("connection failed");
$sql = "SELECT * FROM cities";
$result = mysqli_query($conn, $sql) or die("SQL query faild.");
$output = "";
if (mysqli_num_rows($result) > 0) {
    //$output = '<table border="1" width="11%" cellspacing="0" cellpadding="1px">';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<option>{$row['City']}</option>";
    }
    //$output .= "</table>";
    mysqli_close($conn);
    //echo $output;
} else {
    echo "<h2> No record found</h2>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Web Page</title>
    <style>
        #header {
            background: lightgreen;
        }

        #city-dropdown {
            background: #ffffff;
        }

        #table-form {
            background: teal;
        }

        #table-load,
        #table-data {
            text-align: center;
        }

        #table-data th {
            background: #74b9ff;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <table id="main" width="100%" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Search with AJAX live search</h1>
                <!-- <div id="search-bar"> -->
                <select id="search-bar">
                    <option>Please select City</option>
                    <?php echo $output; ?>
                </select>
                <!-- <input type="text" id="serach" placeholder="Enter a city" autocomplete="off"> -->
                <!-- </div> -->
                <!-- <div id="city-dropdown"></div> -->
            </td>
        </tr>

        <td id="table-data">
        </td>
        </tr>
    </table>

    <script type="text/javascript">

        $(document).ready(function () {
            //live serach
            $('#search-bar1').on('change', function () {
                var search_term = $(this).val();
                if (search_term.length > 0) {
                    $.ajax({
                        url: 'dropdown.php',
                        type: 'POST',
                        data: { input: search_term },
                        success: function (response) {
                            $('#city-dropdown').html(response);
                        }
                    });
                } else {
                    $('#city-dropdown').empty();
                }
            });

            $("#search-bar").on("change", function () {

                var search_term = $(this).val(); alert(search_term);
                if (search_term.length > 0) {
                    $.ajax({
                        url: "citydetails.php",
                        type: "POST",
                        data: { search: search_term },
                        success: function (data) {
                            $("#table-data").html(data);
                        }
                    });
                } else {
                    $('#table-data').empty();
                }
            });
        });

    </script>
</body>

</html>