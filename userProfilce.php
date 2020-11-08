<?php 
    include "./inc/scripts/functions.php";
?>

<html>
    <header>
        <title>User Profile</title>
        <!-- import bootstrap and other libs -->
        <?php 
            include "./inc/header.php"
        ?>
    </header>
    <body>
        <div class="container-fullwidth">
            <!-- Slika profila ime in rank in točke -->
            <div class="green-background">
                <div class="custom-row profile-header">
                    <div class="col">
                        <img class="profile-image" src="./inc/images/profile.png" alt="profile.pic"  />
                    </div>
                    <div class="col center-ver-hor">
                        <div style="text-align: center;">
                            <span class="header2"><?= getGetUserDataById(8); ?></span>
                            <p>
                                <span class="grayedOut">Rang <?= returnRandom(10, 20); ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col center-ver-hor" style="text-align: center;">
                        <span class="header1"><?= returnRandom(50, 100); ?></span>
                    </div>
                </div>
            </div>

            <!-- Meseci content -->
            <div class="content-card">
                <!-- mesec div -->
                <?php foreach(getMonths(4) as $key=>$value): ?>
                    <?php if(fmod($key, 2) == 0): ?>
                            <div class="list-item row left-slide">
                        <?php else: ?>
                            <div class="list-item row right-slide">
                        <?php endif; ?>
                            <div class="col" style="padding-left: 5%; padding-top: 2.5%;">
                                <p>
                                    <span class="header3"><?= $value; ?></span><br/>
                                    <span class="grayedOut-minor">Rang <?= returnRandom(10, 20) . " - " . returnRandom(50, 100) . " points"; ?></span>
                                </p>
                            </div>
                            <div class="col" style="padding-top: 2.5%">
                                <button class="details-button">Details</button>
                            </div>
                        </div>
                <?php endforeach; ?>



                <hr class="green-break">
                
                    <div class="custom-row">

                        <!-- stevio odlozenih smeti -->
                        <div class="col center-icons">
                            <span class="profile-icon"><i class="fa fa-trash fa-10x" aria-hidden="true"></i></span><br/>
                            <span class="header3"><?= returnRandom(100, 200); ?></span>
                        </div>

                        <!-- stevilo porabljenih ur -->
                        <div class="col center-icons">
                            <span class="profile-icon"><i class="fa fa-clock-o fa-10x" aria-hidden="true"></i></span><br/>
                            <span class="header3"><?= getNumberOfHours(1); ?>H</span>
                        </div>

                        <!-- Datum zadnje odelezitve -->
                        <div class="col center-icons">
                            <span class="profile-icon"><i class="fa fa-calendar-o fa-10x" aria-hidden="true"></i></span><br/>
                            <span class="header3"><?= getLatestAction(1); ?></span>
                        </div>
                    </div>

            </div>

            <!-- toolbar -->
            <div class="bottom-toolbar">
                <div class="custom-row">
                    <!-- first icon -->
                    <div class="col center-icons">
                        <button id="user-profile-button" class="toolbar-button" onclick="window.location.href='userProfilce.php'">
                            <span class="toolbar-icon"><i class="fa fa-user fa-10x" aria-hidden="true"></i></span>
                        </button>
                    </div>

                    <!-- second icon -->
                    <div class="col center-icons">
                        <button id="all-actions-button" class="toolbar-button" onclick="window.location.href='actionOverview.php'">
                            <span class="toolbar-icon"><i class="fa fa-list-ul fa-10x" aria-hidden="true"></i></span>
                        </button>
                    </div>

                    <!-- third icon -->
                    <div class="col center-icons">
                        <button id="new-action-button" class="toolbar-button" onclick="window.location.href='ActionAdding/image_upload.html'">
                            <span class="toolbar-icon"><i class="fa fa-plus fa-10x" aria-hidden="true"></i></span>
                        </button>
                    </div>
                    
                    <!-- fourth icon -->
                    <div class="col center-icons">
                        <button id="leaderboards-button" class="toolbar-button" onclick="window.location.href='Standings/standings.php'">
                            <span class="toolbar-icon"><i class="fa fa-trophy fa-10x" aria-hidden="true"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>