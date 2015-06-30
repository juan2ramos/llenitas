<?php
include('include/env.php');
$message = '';
if ($_POST) {
    include('include/Login.php');
    $login = new Login($_POST, $dataBase);
    $message = $login->getMessage();
}
?>
<section class="excel">
    <?php if (!isset($_SESSION["user_name"])) : ?>
        <span><?php echo $message ?></span>
        <form method="post" action="excel">
            <div class="content-form">
                <h2>Ingresa los datos</h2>
                <input type="text" name="user_name" placeholder="Usuario">
                <input type="password" name="password" placeholder="Clave">
                <button type="submit"> Enviar</button>
        </form>

    <?php
    else:
        include('include/env.php');

        $connection = Connection::getInstance($dataBase);
        $sqlTxt = 'select * from `User-List` ' ;
        $users = $connection->query($connection->run($sqlTxt));


        ?>

        <a href="include/excel.php" class="excelContent">

            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 x="0px" y="0px"
                 width="50px" height="50px" viewBox="0 0 548.291 548.291"
                 style="enable-background:new 0 0 548.291 548.291;"
                 xml:space="preserve">
<g>
    <path d="M486.206,196.121H473.04v-63.525c0-0.396-0.062-0.795-0.109-1.2c-0.021-2.52-0.829-4.997-2.556-6.96L364.657,3.677
		c-0.033-0.031-0.064-0.042-0.085-0.075c-0.63-0.704-1.364-1.29-2.143-1.796c-0.229-0.154-0.461-0.283-0.702-0.419
		c-0.672-0.365-1.387-0.672-2.121-0.893c-0.2-0.052-0.379-0.134-0.577-0.186C358.23,0.118,357.401,0,356.562,0H96.757
		C84.894,0,75.256,9.649,75.256,21.502v174.613H62.092c-16.971,0-30.732,13.756-30.732,30.733v159.812
		c0,16.961,13.761,30.731,30.732,30.731h13.164V526.79c0,11.854,9.638,21.501,21.501,21.501h354.776
		c11.853,0,21.501-9.647,21.501-21.501V417.392h13.166c16.966,0,30.729-13.764,30.729-30.731V226.854
		C516.93,209.872,503.176,196.121,486.206,196.121z M96.757,21.502h249.054v110.006c0,5.94,4.817,10.751,10.751,10.751h94.972
		v53.861H96.757V21.502z M314.576,314.661c-21.124-7.359-34.908-19.045-34.908-37.544c0-21.698,18.11-38.297,48.116-38.297
		c14.331,0,24.903,3.014,32.442,6.413l-6.411,23.2c-5.091-2.446-14.146-6.037-26.598-6.037s-18.488,5.662-18.488,12.266
		c0,8.115,7.171,11.696,23.58,17.921c22.446,8.305,33.013,20,33.013,37.921c0,21.323-16.415,39.435-51.318,39.435
		c-14.524,0-28.861-3.769-36.031-7.737l5.843-23.77c7.738,3.958,19.627,7.927,31.885,7.927c13.218,0,20.188-5.47,20.188-13.774
		C335.894,324.667,329.858,320.13,314.576,314.661z M265.917,343.9v24.157h-79.439V240.882h28.877V343.9H265.917z M94.237,368.057
		H61.411l36.788-64.353l-35.473-62.827h33.021l11.125,23.21c3.774,7.736,6.606,13.954,9.628,21.135h0.367
		c3.027-8.115,5.477-13.775,8.675-21.135l10.756-23.21h32.827l-35.848,62.066l37.74,65.103h-33.202l-11.515-23.022
		c-4.709-8.855-7.73-15.465-11.316-22.824h-0.375c-2.645,7.359-5.845,13.969-9.811,22.824L94.237,368.057z M451.534,520.968H96.757
		V417.392h354.776V520.968z M451.728,368.057l-11.512-23.022c-4.715-8.863-7.733-15.465-11.319-22.825h-0.366
		c-2.646,7.36-5.858,13.962-9.827,22.825l-10.551,23.022h-32.836l36.788-64.353l-35.471-62.827h33.02l11.139,23.21
		c3.77,7.736,6.593,13.954,9.618,21.135h0.377c3.013-8.115,5.459-13.775,8.671-21.135l10.752-23.21h32.835l-35.849,62.066
		l37.733,65.103h-33.202V368.057z"/>
</g>
</svg>
            Descargar Excel</a>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>phone</th>
                <th>Cedula</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user):?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo$user['phone'] ?></td>
                <td><?php echo $user['number-identification'] ?></td>
                <td><?php echo $user['date'] ?></td>
            </tr>
            <?php endforeach?>
            </tbody>
        </table>
    <?php endif ?>
</section>