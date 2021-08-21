<?php 
session_start();

	include("../connection.php");
    include("../connection1.php");
	include("function.php");
    
	$user_data = check_login($conn);
    $Team = mysqli_query($conn,"select * from user_team");
    $Roll_No=$user_data['Roll_No'];
    $Invite = mysqli_query($conn,"select * from invite where Roll_No='$Roll_No'");
    $Poll = mysqli_query($conn1,"show table status");

    if(isset($_GET['del_invite'])){
        $Tname=$_GET['del_invite'];
        mysqli_query($conn,"delete from invite where Team_Name='$Tname' and Roll_No='$Roll_No'");
        header("Location: mainpage.php");
    }
    if(isset($_GET['upd_invite'])){
        $Tname=$_GET['upd_invite'];
        if($user_data['Team'] == "Not designated"){
            mysqli_query($conn,"update user_details set Team='$Tname' where Roll_No='$Roll_No'");
            mysqli_query($conn,"update user_team set Member=Member+1 where Name='$Tname'");
            header("Location: mainpage.php");
        }else{
            $x = $user_data['Team'];
            echo "<script type='text/javascript'>alert('You are already in $x, Please contact Admin....');window.history.back();</script>";
        }  
    }
?>

<html>
    <head>
        <title>Delta 2021</title>
        <link rel="stylesheet" href="mainpage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
        <link rel="icon" href="data:image/png;base64,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" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="mainpage.js"></script>
    </head>
    <body onclick="click()">
        <nav>
            <img class="icon" src="data:image/png;base64,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" alt="Delta">
            <i id="menu" onclick="menu(this)" class="fa fa-bars" style="font-size: 30px;display: block;"></i>
            <i id="back" onclick="menu(this)" class="fa fa-chevron-up" style="font-size: 30px;display: none;color: crimson;"></i>
        </nav>
        <div class="sidebar" id="sidebar">
            <a href="#" class="bar-item" onclick="Change('dashboard')"><i class="fa fa-home" style="font-size: 30px;margin-right: 5%;"></i><span style="color: crimson;">D</span>ashboard</a>
            <a href="#" class="bar-item" onclick="Change('team')"><i class="fa fa-users" style="font-size: 30px;margin-right: 5%;"></i><span style="color: crimson;">T</span>eam</a>
            <a href="#" class="bar-item" onclick="Change('poll')"><i class="fa fa-database" style="font-size: 30px;margin-right: 7.5%;"></i><span style="color: crimson;">P</span>oll</a>
            <a href="logout.php" class="bar-item"><i class="fa fa-sign-out" style="font-size: 30px;margin-right: 7.5%;"></i><span style="color: crimson;">L</span>ogout</a>
        </div>
        <section class="welcome" id="welcome"  onclick="sidebarclose()">
            <label>Welcome <span style="color: crimson;" id="name"><?php echo $user_data['Name'];?></span></label>
            <lab>Team : <span><?php echo $user_data['Team'];?></span></lab>
        </section>
        <section class="dashboard" id="dashboard" onclick="sidebarclose()">
            <div class="welcomeback">
                <i class="fa fa-angle-left"></i>
                <label style="cursor: pointer;" onclick="welcome('dashboard')">Back</label>
            </div>
            <div style="float: right;">
                <label class="head">Dashboard</label>
                <label style="color: crimson;font-size: 20px;"> - Summary of You</label>
            </div>
            <div style="border: 3px solid grey;margin-top: 5%;"></div>
            <div class="name">
                <label id="name"><span style="color: crimson;">Name:</span> <?php echo $user_data['Name'];?></label>
            </div>
            <div class="name">
                <label id="Roll"><span style="color: crimson;">Designation:</span> <?php echo $user_data['Designation'];?></label>
                <label id="Roll"><span style="color: crimson;margin-left: 20%;">Team:</span> <?php echo $user_data['Team'];?></label>
            </div>
            <div class="name">
                <label id="RollNo"><span style="color: crimson;">Roll Number:</span> <?php echo $user_data['Roll_No'];?></label>
            </div>
            <div class="name">
                <label id="Email"><span style="color: crimson;">Email Id:</span> <?php echo $user_data['Email'];?></label>
            </div>
        </section>
        <section class="dashboard" id="team" onclick="sidebarclose()">
            <div class="welcomeback">
                <i class="fa fa-angle-left"></i>
                <label style="cursor: pointer;" onclick="welcome('team')">Back</label>
            </div>
            <div style="float: right;">
                <label class="head">Team</label>
                <label style="color: crimson;font-size: 20px;"> - A Family of Yours</label>
            </div>
            <div style="border: 3px solid grey;margin-top: 5%;"></div>
            <div class="teamnav">
                <ul>
                    <li onclick="TChange(1)">View Team</li>
                    <li onclick="TChange(2)">Invite</li>
                </ul>
            </div>
            <div class="MTeam" id="MTeam">
                <div class="dis">
                    <?php while($team = mysqli_fetch_array($Team)){ ?>
                        <div class="disbar">
                            <label id="Tname"><?php echo $team['Name']?></label>
                            <label class="cdate">created on: <span id="cdate" style="color: crimson;"><?php echo $team['Date']?></span></label>
                            <br><label class="tmem">Memeber: <span id="Tmem"><?php echo $team['Member']?></span></label>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="MTeam" id="ITeam">
                <div class="dis">
                    <?php while($invite = mysqli_fetch_array($Invite)){ ?>
                        <div class="disbar">
                            <label id="Tname"><?php echo $invite['Team_Name']?></label>
                            <label class="cdate">sent on: <span id="cdate" style="color: crimson;"><?php echo $invite['Date']?></span></label>
                            <br><a href="mainpage.php?del_invite=<?php echo $invite['Team_Name']?>" style="color:crimson;"><i class="fa fa-trash" style="float:right;" title="Remove"></i></a>
                            <a href="mainpage.php?upd_invite=<?php echo $invite['Team_Name']?>" style="color:black;"><i class="fa fa-check-circle"  style="float: right;margin-right: 2.5%;" title="Accept"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="dashboard" id="poll" onclick="sidebarclose()">
            <div class="welcomeback">
                <i class="fa fa-angle-left"></i>
                <label style="cursor: pointer;" onclick="welcome('poll')">Back</label>
            </div>
            <div style="float: right;">
                <label class="head">Poll</label>
                <label style="color: crimson;font-size: 20px;"> - Give Your Opinion</label>
            </div>
            <div style="border: 3px solid grey;margin-top: 5%;"></div>
            <div>
                <div class="teamnav">
                    <ul>
                        <li>View Poll</li>
                    </ul>
                </div>
                <div class="MTeam" id="MPoll">
                    <div class="dis">
                        <?php while($poll = mysqli_fetch_array($Poll)){ ?>
                        <div class="disbar">
                            <label id="Tname"><?php echo $poll[0];?></label>
                            <?php $query=mysqli_query($conn1,"select * from $poll[0] where `Roll_No`=$Roll_No");
                                $result=mysqli_fetch_row($query);
                                if(!$result) {?>
                                <label class="cdate">created: <span id="cdate" style="color: crimson;"><?php echo $poll[11];?></span></label><br>
                                <a href="Poll/formpoll.php?Pname=<?php echo $poll[0]?>&Roll_No=<?php echo $Roll_No?>" style="color:black;"><i class="fa fa-tasks"  style="float: right;margin-right: 0.5%;" title="Do <?php echo $poll[0];?>"></i></a>
                            <?php }else{ ?>
                                <label class="cdate">created: <span id="cdate" style="color: green;"><?php echo $poll[11];?></span></label><br>
                                <span id="cdate" style="color: green;float:right;font-size:medium;">Done</span>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>