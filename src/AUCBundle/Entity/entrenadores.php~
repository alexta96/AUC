<?php

namespace AUCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * entrenadores
 *
 * @ORM\Table(name="entrenadores")
 * @ORM\Entity(repositoryClass="AUCBundle\Repository\entrenadoresRepository")
 */
class entrenadores
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
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="titulaciones", type="string", length=255)
     */
    private $titulaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono1", type="string", length=12)
     */
    private $telefono1;

    /**
     * @ORM\OneToOne(targetEntity="equipos", inversedBy="entrenador")
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
     * @return entrenadores
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
     * Set titulaciones
     *
     * @param string $titulaciones
     *
     * @return entrenadores
     */
    public function setTitulaciones($titulaciones)
    {
        $this->titulaciones = $titulaciones;

        return $this;
    }

    /**
     * Get titulaciones
     *
     * @return string
     */
    public function getTitulaciones()
    {
        return $this->titulaciones;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return entrenadores
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
     * Set telefono1
     *
     * @param string $telefono1
     *
     * @return entrenadores
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    /**
     * Get telefono1
     *
     * @return string
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }
    
}
