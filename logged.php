<?php
include_once 'utils.inc.php';
include_once 'models/Model.php';

page_start('Vanéstarre', ['css/home.css']);

?>

    <header>
        <div>
            <img class="logoHeader" src="assets/logoPurple.png" alt="logo">
            <h1 id="title"> Vanéstarre</h1>
        </div>
        <div id="backgroundSearch">
            <input id="searchBar" type="search">
            <img src="assets/search.png">
        </div>
        <div id="iconNav" ">
            <img class="iconHeader" id="parameterIcon" src="assets/parameter.png" alt="">
            <img class="iconHeader" id="notificationIcon" src="assets/notification.png" alt="">
            <img class="iconHeader" id="logoutIcon" src="assets/logout.png" alt="">
            <span class="userHeader">
                <?php
                    $user = getUserById($sessionid);
                    $user_username = $user['name'];
                    echo $user_username;
                ;?>
            </span>
            <img class="iconPicture"src="assets/profile-user.png" alt="">
        </div>
    </header>

    <div id="sectionPost">
        <div id="newPost">
            <form id="writeMessageBox">
                <input type="text" placeholder="Ecrire un message ..." onchange="countChar()" id="writeMessage" maxlength="50" value="" >
                <div id="writeButtonBox">
                    <span id="countCharMessage">0/50</span>
                    <button id="sendButton">Envoyer</button>
                </div>
            </form>


            <?php displayPosts($posts, $sessionid) ?>

        </div>


    </div>

    <footer></footer>

<?php
page_end()
?>