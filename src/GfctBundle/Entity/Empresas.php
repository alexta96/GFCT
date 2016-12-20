<?php
namespace GfctBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Empresas
 *
 * @ORM\Table(name="empresas")
 * @ORM\Entity(repositoryClass="GfctBundle\Repository\EmpresasRepository")
 */
class Empresas
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
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;
    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;
    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5)
     */
    private $cp;
    /**
     * @var string
     *
     * @ORM\Column(name="telefono1", type="string", length=13)
     */
    private $telefono1;
    /**
     * @var string
     *
     * @ORM\Column(name="telefono2", type="string", length=13)
     */
    private $telefono2;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;
    /**
     * @ORM\OneToMany(targetEntity="Alumnos", mappedBy="empresa")
     */
    private $alumnos;
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
     * @return Empresas
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Empresas
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }
    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Empresas
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
        return $this;
    }
    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }
    /**
     * Set telefono1
     *
     * @param string $telefono1
     *
     * @return Empresas
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
    /**
     * Set telefono2
     *
     * @param string $telefono2
     *
     * @return Empresas
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;
        return $this;
    }
    /**
     * Get telefono2
     *
     * @return string
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }
    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Empresas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }
    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Add alumno
     *
     * @param \GfctBundle\Entity\Alumnos $alumno
     *
     * @return Empresas
     */
    public function addAlumno(\GfctBundle\Entity\Alumnos $alumno)
    {
        $this->alumnos[] = $alumno;
        return $this;
    }
    /**
     * Remove alumno
     *
     * @param \GfctBundle\Entity\Alumnos $alumno
     */
    public function removeAlumno(\GfctBundle\Entity\Alumnos $alumno)
    {
        $this->alumnos->removeElement($alumno);
    }
    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }
}