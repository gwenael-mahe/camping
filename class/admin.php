<?php


class admin extends bdd{

    public function lieu($prix){
        $this->connect();
        $request = "UPDATE prix SET prix = $prix WHERE nom = 'lieu'";
        $query = mysqli_query($this->connexion,$request);
    }
    public function borne($prix){
        $this->connect();
        $request = "UPDATE prix SET prix = $prix WHERE nom = 'borne'";
        $query = mysqli_query($this->connexion,$request);
    }
    public function club($prix){
        $this->connect();
        $request = "UPDATE prix SET prix = $prix WHERE nom = 'club'";
        $query = mysqli_query($this->connexion,$request);
    }
    public function activite($prix){
        $this->connect();
        $request = "UPDATE prix SET prix = $prix WHERE nom = 'activites'";
        $query = mysqli_query($this->connexion,$request);
    }
    public function tableau(){
        $this->connect();
        $request = "SELECT nom, prix FROM prix";
        $query = mysqli_query($this->connexion,$request);
        $fetch = mysqli_fetch_all($query);
        ?>
            <table class="table_admin">
        <?php
        for($i=0; $i <= 3; ++$i){
            ?>
            
                <tr>
                    <td><?php echo $fetch[$i][0] ?></td>
                    <td><?php echo $fetch[$i][1] ?>€</td>
                </tr>
            
            <?php
        }
        ?>
            </table>
        <?php
    }
    public function tableauresa(){
        $this->connect();
        $request = "SELECT reservations.id, reservations.checkin, reservations.checkout, reservations.lieu, reservations.emplacement, reservations.prix, utilisateurs.login FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id";
        $query = mysqli_query($this->connexion,$request);
        $fetch = mysqli_fetch_all($query);
        ?>
            <table class="table_resa_admin">
            
                <thead>
                    <tr>
                        <td>Login</td>
                        <td>Arrivé</td>
                        <td>Départ</td>
                        <td>Lieu</td>
                        <td>Emplacement</td>
                        <td>Prix</td>
                        <td>Annuler</td>
                    </tr>
                </thead>
        <?php
            foreach($fetch as list($id,$checkin,$checkout,$lieu,$empla,$prix,$login)){
                ?>
                <tr>
                    <td><?php echo $login ?></td>
                    <td><?php echo $checkin ?></td>
                    <td><?php echo $checkout ?></td>
                    <td><?php echo $lieu ?></td>
                    <td><?php echo $empla ?></td>
                    <td><?php echo $prix ?></td>
                    <td><a class="supp_profil" href="include/deleteresa.php?id=<?php echo $id ?>">delete</a></td>
                </tr>
                <?php
            }
        ?>
        </table> 
        <?php
    }
    public function delete($id){
        $this->connect();
        $request = "DELETE FROM reservations WHERE id = $id";
        $query = mysqli_query($this->connexion,$request);
    }
}
?>
