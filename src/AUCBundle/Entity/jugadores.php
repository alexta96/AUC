<?php

namespace AUCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * jugadores
 *
 * @ORM\Table(name="jugadores")
 * @ORM\Entity(repositoryClass="AUCBundle\Repository\jugadoresRepository")
 */
class jugadores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     *
     *
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     *
     *
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="posicion", type="string", length=255)
     *
     *
     */
    private $posicion;

    /**
     * @ORM\ManyToOne(targetEntity="equipos", inversedBy="jugador")
     * @ORM\JoinColumn(name="equipo_id", referencedColumnName="id")
     */

    private $equipo;
    
    /**
     * Get id
     *
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return jugadores
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return jugadores
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set posicion
     *
     * @param string $posicion
     *
     * @return jugadores
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return string
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set equipo
     *
     * @param string $equipo
     *
     * @return jugadores
     */

    /**
     * Set equipo
     *
     * @param \AUCBundle\Entity\equipos $equipo
     *
     * @return jugadores
     */
    public function setEquipo(\AUCBundle\Entity\equipos $equipo = null)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return \AUCBundle\Entity\equipos
     */
    public function getEquipo()
    {
        return $this->equipo;
    }
}
