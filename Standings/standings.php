<?php 
    include ".././inc/scripts/functions.php";
?>

<html>
<header>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='standings.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
</header>
<body>
    <div class="container-fullwidth mainContainer">
        <!-- HeaderContainer -->
        <div class="container-fluid upperContainer">
            <div class="row">
                <div class="col-3" style="height: 100%; position: relative;">
                    <div style="position: absolute; bottom: -95px;">
                        <!-- fetch from DB -->
                        <h2 class="headerColor">Leaderboard Ljubljana</h2>
                    </div>
                </div>
                <div class="col-9" style="height: 100%; position: relative;">
                    <div class="participantsViewDiv" style="display: inline-flex;">
                        <div>
                            <i class="fa fa-eye fa-2x" aria-hidden="true" style="color: white; position: absolute; bottom: 16px; right: 50px;"></i>
                        </div>
                        <div>
                            <!-- tobe fixed after findingdb -->
                            <h1 class="participantsViewColor">14</h1>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>        

        <!-- MainContainer -->
        <!-- fetch from DB -->
        <div class="container-fluid middleContainer" style="overflow-y: auto;">
            <ul class="list-group">
                <?php $leaderCount = 1 ?>
                <?php foreach(getLeaderboardFroAction(3) as $key=>$value): ?>
                    <li class="list-group-item" style="background-color: #758e4f;">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-user fa-3x" aria-hidden="true" style="color: white;"></i>
                            </div>
                            <div class="col-8">
                                <span><?= $value["name"] ?></span>
                                </br>
                                <span><?= $value["score"] ?></span>
                            </div>
                            <div class="col-2">
                                <h2><?= $leaderCount?>.</h2>
                            </div>
                        </div>
                    </li>
                    <?php $leaderCount += 1 ?>
                    <?php if($leaderCount == 15) {break;} ?>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <!-- BottomToolbar -->
        <div class="container-fluid bottomContainer" style="border-radius: 11px 11px 0px 0px; background-color: #758e4f;">
            <div class="bottom-toolbar">
                <div class="row">
                    <!-- first icon -->
                    <div class="col-3">
                        <button id="user-profile-button" class="toolbar-button" style="margin-top: 5px;" onclick="window.location.href='../userProfilce.php'">
                            <span class="toolbar-icon"><i class="fa fa-user fa-3x" aria-hidden="true"></i></span>
                        </button>
                    </div>

                    <!-- second icon -->
                    <div class="col-3">
                        <button id="all-actions-button" class="toolbar-button" style="margin-top: 5px;" onclick="window.location.href='../actionOverview.php'">
                            <span class="toolbar-icon"><i class="fa fa-list-ul fa-3x" aria-hidden="true"></i></span>
                        </button>
                    </div>

                    <!-- third icon -->
                    <div class="col-3">
                        <button id="new-action-button" class="toolbar-button" style="margin-top: 5px;" onclick="window.location.href='../ActionAdding/image_upload.html'">
                            <span class="toolbar-icon"><i class="fa fa-plus fa-3x" aria-hidden="true"></i></span>
                        </button>
                    </div>
                    
                    <!-- fourth icon -->
                    <div class="col-3">
                        <button id="leaderboards-button" class="toolbar-button" style="margin-top: 5px;" onclick="window.location.href='standings.php'">
                            <span class="toolbar-icon"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>
