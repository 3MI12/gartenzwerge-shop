<?php
namespace clientuser;
/**
 * @Entity
 * @Table(name="clients")
 */
class ClientUser
{
        /**
        * @Id @Column(type="integer")
        * @GeneratedValue
        */
	private $cid;
	/** @Column(type="string") */
	private $street;
}
