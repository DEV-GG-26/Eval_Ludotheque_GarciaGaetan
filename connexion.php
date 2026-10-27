<?php
session_start();
$messageCo = '';
if(isset($_POST['submitCo'])){


    if(!empty($_POST['emailCo']) && !empty($_POST['passwordCo'])){

        if(filter_var($_POST['emailCo'],FILTER_VALIDATE_EMAIL)){

            $email = trim($_POST['emailCo']);

            try{
                $pdo = new PDO('mysql:host=localhost;dbname=ludotheque','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

                $request = $pdo->prepare('SELECT m.id_membre, m.prenom, m.nom, m.email, m.mot_de_passe, m.date_inscription FROM membre m WHERE m.email = ?');
                $request->bindParam(1,$email,PDO::PARAM_STR);
                $request->execute();
                $data = $request->fetch(PDO::FETCH_ASSOC);
                if(!empty($data)){
                    if(password_verify($_POST['passwordCo'],$data["mot_de_passe"])){
                        $_SESSION['id'] = $data['id_membre'];
                        $_SESSION['nom'] = $data['nom'];
                        $_SESSION['prenom'] = $data['prenom'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['date_inscription'] = $data['date_inscription'];
                        $messageCo = "{$_SESSION['prenom']} {$_SESSION['nom']} est bien connecté !";
                    }else{
                        $messageCo = "Email et/ou Mot de Passe incorrect.";
                    }
                }else{
                    $messageCo = "Email et/ou Mot de Passe incorrect.";
                }
            }catch(EXCEPTION $error){
                die($error->getMessage());
            }
        }else{
            $messageCo = 'Vous devez entrer un email valide';
        }
    }else{
        $messageCo = 'Veuillez remplir tous les champs';
    }
}
include_once __DIR__ .'/includes\header.php';
?>
        <?php 
            if(!isset($_SESSION['id'])){
        ?>
            <section>
                <h2>Connexion</h2>
                <form action="" method="post">
                    <label for="emailCo">Email <input type="text" name="emailCo" id="emailCo"></label>
                    <label for="passwordCo">Mot de Passe <input type="text" name="passwordCo" id="passwordCo"></label>
                    <input type="submit" name="submitCo">
                </form>
            </section>
        <?php
            }
        ?>
        <p>
            <?php echo($messageCo) ?>
        </p>
<?php
    include_once __DIR__ .'/includes\footer.php';
?>