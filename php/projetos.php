<?php 

    require_once('./configuracao_mysql.php');

    $query = "SELECT * FROM projetos";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
?>
  
        <div class="projeto">
            <div class="left">

                <div class="chart">
                    <svg viewBox="0 0 232 232" style="--percentage: <?=$row['porcentagem']?>">
                        <circle
                            cx ="50%"
                            cy ="50%"
                            r="98.5"
                            opacity="0.1"
                            stroke="#D9D9D9"
                        />
    
                        <circle
                            cx ="50%"
                            cy ="50%"
                            r="98.5"
                            stroke="url(#paint0_linear_201_85)"
                        />
    
                        <defs>
                            <linearGradient id="paint0_linear_201_85" x1="-9" y1="82" x2="145" y2="178" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#F40102"/>
                                <stop offset="1" stop-color="#F40102"/>
                            </linearGradient>
                        </defs>
                    </svg>
                        
                    <div class="content">
                        <h3><?=$row['porcentagem']?>%</h3>
                    </div>
                </div>
                <div class="projeto_informacoes">
                    <h5><?=$row['titulo']?></h5>
                    <p>Data contrato: <i>04/06/2024</i></p>
                </div>

            </div>
            <button onclick="location.href='./testes.html?id=<?=$row['id']?>'">
                <ion-icon name="eye"></ion-icon>
            </button>
        </div>
<?php
}

?>