<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main/style.css">
    <style>
            nav{
                    margin: 10px;
            }
            div{
                    margin: 50px 5px;
                    display: inline;
            }
            a{
                    display: inline;
            }
            button{
                    background-color : rgba(0,0,0,0.3);
                    width : 18%;
                    height : 180px;
                    font-size: 120%;
            }
            button:hover{
                    background-color : rgba(1,1,1,0.8);
                    color : #FFFFFF;
            }
    </style>
</head>
<body>
        <header>
                <a href="php/clickHome.php">
                        <h1>
                        <img src="images/main/cow1.png" alt="소고기 유통 시스템" width="50" height="50">
                        소고기 유통 관리 시스템
                        </h1>
                </a>
                <h4>
                        <a href="changeUserInformation.php">정보 수정</a>
                        <a href="php/logout.php">로그 아웃</a>
                </h4>
        </header>
        <nav></nav>

        <?php
                
                switch($_COOKIE['kind']){
                        case 1 : 
                                break;
                        case 2 : 
                                $beefNo = $_GET['BeefNo']-10;
                                for($i = 1; $i<=10; $i++){
                                        $no = $beefNo+$i;
                                        $no = $no*100;
                                        
                                        echo "
                                        <div style='page-break-before:always'>
                                                <a href='javascript:window.print()'><button id='print-button'><img src='result/$no.png' alt='소고기 유통 시스템' width='100' height='100'><p>$no</p></button></a>
                                        </div>";
                                }
                                break;
                        case 3 : 
                                break;
                        case 4 : 
                                $beefNo = $_GET['BeefNo'];
                                echo "
                                <div style='page-break-before:always'>
                                        <a href='javascript:window.print()'><button id='print-button'><img src='result/$beefNo.png' alt='소고기 유통 시스템' width='100' height='100'><p>$beefNo</p></button></a>
                                </div>";
                        
                                break;
                }
                
        ?>

        
        <br>
        <a href="taskChoice.php" class="abutton">뒤로가기</a>
        <a href="index.html" class="abutton">홈</a>
        <footer>Copyright (c) 2017 meat management
                <div class="right">
                        database project
                </div>
        </footer>
</body>
</html>