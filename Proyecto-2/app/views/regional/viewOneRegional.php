<div class="data-container">
    <div class="navegate-group">
        <div class="back">
            <a href="/regional/view"><img src="/img/back.svg"></a>
        </div>
    </div>
    <div class="info">
        <?php
            if($regional && is_object($regional)){
                echo "
                    <div class='record-one'>
                        <span>ID: $regional->id</span>
                        <span>Nombre: $regional->nombre</span>
                    </div>
                ";      
            }
        ?>
    </div>
</div>