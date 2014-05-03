<?php
/**
 * @Entity
 * @Table(name="temp_image")
 */
class tempImage{
        /**
        * @Id @Column(type="integer")
        * @GeneratedValue
        */
	private $pid;
	/** @Column(type="string") */
	private $picture;
}
