<?php

require_once 'Modele/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Billet extends Modele
{

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets()
    {
        $sql = 'select TIC_ID as id, TIC_DATE as date,'
            . ' TIC_TITRE as titre, TIC_CONTENU as contenu, ETA_LIB as etat from T_TICKET, T_ETA'
            . ' where T_ETA.ETA_ID = T_TICKET.ETA_ID'
            . ' order by TIC_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet)
    {
        $sql = 'select TIC_ID as id, TIC_DATE as date,'
            . ' TIC_TITRE as titre, TIC_CONTENU as contenu, ETA_LIB as etat from T_TICKET,T_ETA'
            . ' where TIC_ID=? and T_ETA.ETA_ID = T_TICKET.ETA_ID';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
}
