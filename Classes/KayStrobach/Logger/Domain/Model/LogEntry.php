<?php
namespace KayStrobach\Logger\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "KayStrobach.Logger".    *
 *                                                                        *
 *                                                                        */

use Doctrine\Tests\ORM\Functional\UUIDGeneratorTest;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class LogEntry {
	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
	 */
	protected $authenticationManager;

	/**
	 * @var string $id
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="UUID")
	 */
	protected $id;

	/**
	 * @var string $action
	 *
	 * @ORM\Column(type="string", length=8)
	 */
	protected $action;

	/**
	 * @var string $loggedAt
	 *
	 * @ORM\Column(name="logged_at", type="datetime")
	 */
	protected $loggedAt;

	/**
	 * @var string $objectId
	 *
	 * @ORM\Column(name="object_id", length=64, nullable=true)
	 */
	protected $objectId;

	/**
	 * @var string $objectClass
	 *
	 * @ORM\Column(name="object_class", type="string", length=255)
	 */
	protected $objectClass;

	/**
	 * @var integer $version
	 *
	 * @ORM\Column(type="integer")
	 */
	protected $version;

	/**
	 * @var string $data
	 *
	 * @ORM\Column(type="array", nullable=true)
	 */
	protected $data;

	/**
	 * @var string $data
	 *
	 * @ORM\Column(length=255, nullable=true)
	 */
	protected $username = NULL;

	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param string $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getAction() {
		return $this->action;
	}

	/**
	 * @param string $action
	 */
	public function setAction($action) {
		$this->action = $action;
	}

	/**
	 * @return string
	 */
	public function getLoggedAt() {
		return $this->loggedAt;
	}

	/**
	 * @param string $loggedAt
	 */
	public function setLoggedAt($loggedAt = NULL) {
		if($loggedAt === NULL) {
			$loggedAt = new \DateTime('now');
		}
		$this->loggedAt = $loggedAt;
	}

	/**
	 * @return string
	 */
	public function getObjectId() {
		return $this->objectId;
	}

	/**
	 * @param string $objectId
	 */
	public function setObjectId($objectId) {
		$this->objectId = $objectId;
	}

	/**
	 * @return string
	 */
	public function getObjectClass() {
		return $this->objectClass;
	}

	/**
	 * @param string $objectClass
	 */
	public function setObjectClass($objectClass) {
		$this->objectClass = $objectClass;
	}

	/**
	 * @return int
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 * @param int $version
	 */
	public function setVersion($version) {
		$this->version = $version;
	}

	/**
	 * @return string
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param string $data
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username = NULL) {
		$this->username = $username;
		if ($this->authenticationManager !== null) {
	            $securityContext = $this->authenticationManager->getSecurityContext();
        	    if ($securityContext->isInitialized() && $securityContext->getAccount()) {
                	$this->username = $this->authenticationManager->getSecurityContext()->getAccount()->getAccountIdentifier();
	            }
       		}
	}
}
