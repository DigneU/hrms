<html>
    <head>
        <title>Testimonials</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.1/flexslider.css"/>
    </head>
    <body>


        <?php
        $dbConnectionObject = getConnection('localhost', 'root', '', 'hrms');
        if ($dbConnectionObject != false) {

            //Get all data for slides
            $slides = getAllTestimonialsReviews($dbConnectionObject);


            //Check if slides count greater thab zero
            if (count($slides) > 0) {
                ?>
                <div class="flexslider">
                    <ul class="slides">

                        <?php
                        foreach ($slides as $slide) {
                            ?>
                            <li><?php echo $slide['CONTENT']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php
            }
        }
        ?>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.1/jquery.flexslider.js"></script>
        <script>

            (function ($) {
                jQuery(document).ready(function () {
                    jQuery('.flexslider').flexslider({
                        animation: "slide",
                        animationLoop: true,
                        itemWidth: 200,
                        itemMargin: 5
                    });
                });

            }(jQuery));
        </script>
    </body>
 <?php
     // Turn on error reporting 
    error_reporting(1);
    ini_set('display_errors', true);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    //Get database connection object
    function getConnection($host, $user, $pass, $databasename) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hrms";
        $conn = new mysqli($servername, $username, $password, $dbname);
        //Check empty
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 

        //vars
        $servername = $host;
        $username = $user;
        $password = $pass;
        $dbname = $databasename;

        //conenction object
        $connectionObject = mysqli_connect($servername, $username, $password, $dbname);

        if (!$connectionObject) {
            die("connection failed:" . mysqli_connect_error());
        }

        return $connectionObject;
    }

    //Get all testimonials
    function getAllTestimonialsReviews($connectionObject = null) {

        //empty check
        if (empty($connectionObject)) {
            die("No conenction object in getALLTestimonialsReviews function");
        }

        //Query
        $query = "select `CONTENT` from post order by POST_ID desc";

        //query result set
        $result = mysqli_query($connectionObject, $query);

        $resultSet = array();
        while ($row = mysqli_fetch_assoc($result)) {

            //grab all results in array
            $resultSet[] = $row;
        }


        //return result
        return $resultSet;
    }
    ?>
</html>