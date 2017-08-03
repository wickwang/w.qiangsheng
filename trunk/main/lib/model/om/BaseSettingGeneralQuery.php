<?php


/**
 * Base class that represents a query for the 'setting_general' table.
 *
 * 
 *
 * @method     SettingGeneralQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SettingGeneralQuery orderBySystemEmailSmtpHost($order = Criteria::ASC) Order by the system_email_smtp_host column
 * @method     SettingGeneralQuery orderBySystemEmailSmtpPort($order = Criteria::ASC) Order by the system_email_smtp_port column
 * @method     SettingGeneralQuery orderBySystemEmailSmtpUseSsl($order = Criteria::ASC) Order by the system_email_smtp_use_ssl column
 * @method     SettingGeneralQuery orderBySystemEmailSmtpUsername($order = Criteria::ASC) Order by the system_email_smtp_username column
 * @method     SettingGeneralQuery orderBySystemEmailSmtpPassword($order = Criteria::ASC) Order by the system_email_smtp_password column
 * @method     SettingGeneralQuery orderBySystemEmailFromAccout($order = Criteria::ASC) Order by the system_email_from_accout column
 *
 * @method     SettingGeneralQuery groupById() Group by the id column
 * @method     SettingGeneralQuery groupBySystemEmailSmtpHost() Group by the system_email_smtp_host column
 * @method     SettingGeneralQuery groupBySystemEmailSmtpPort() Group by the system_email_smtp_port column
 * @method     SettingGeneralQuery groupBySystemEmailSmtpUseSsl() Group by the system_email_smtp_use_ssl column
 * @method     SettingGeneralQuery groupBySystemEmailSmtpUsername() Group by the system_email_smtp_username column
 * @method     SettingGeneralQuery groupBySystemEmailSmtpPassword() Group by the system_email_smtp_password column
 * @method     SettingGeneralQuery groupBySystemEmailFromAccout() Group by the system_email_from_accout column
 *
 * @method     SettingGeneralQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SettingGeneralQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SettingGeneralQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SettingGeneral findOne(PropelPDO $con = null) Return the first SettingGeneral matching the query
 * @method     SettingGeneral findOneOrCreate(PropelPDO $con = null) Return the first SettingGeneral matching the query, or a new SettingGeneral object populated from the query conditions when no match is found
 *
 * @method     SettingGeneral findOneById(int $id) Return the first SettingGeneral filtered by the id column
 * @method     SettingGeneral findOneBySystemEmailSmtpHost(string $system_email_smtp_host) Return the first SettingGeneral filtered by the system_email_smtp_host column
 * @method     SettingGeneral findOneBySystemEmailSmtpPort(int $system_email_smtp_port) Return the first SettingGeneral filtered by the system_email_smtp_port column
 * @method     SettingGeneral findOneBySystemEmailSmtpUseSsl(int $system_email_smtp_use_ssl) Return the first SettingGeneral filtered by the system_email_smtp_use_ssl column
 * @method     SettingGeneral findOneBySystemEmailSmtpUsername(string $system_email_smtp_username) Return the first SettingGeneral filtered by the system_email_smtp_username column
 * @method     SettingGeneral findOneBySystemEmailSmtpPassword(string $system_email_smtp_password) Return the first SettingGeneral filtered by the system_email_smtp_password column
 * @method     SettingGeneral findOneBySystemEmailFromAccout(string $system_email_from_accout) Return the first SettingGeneral filtered by the system_email_from_accout column
 *
 * @method     array findById(int $id) Return SettingGeneral objects filtered by the id column
 * @method     array findBySystemEmailSmtpHost(string $system_email_smtp_host) Return SettingGeneral objects filtered by the system_email_smtp_host column
 * @method     array findBySystemEmailSmtpPort(int $system_email_smtp_port) Return SettingGeneral objects filtered by the system_email_smtp_port column
 * @method     array findBySystemEmailSmtpUseSsl(int $system_email_smtp_use_ssl) Return SettingGeneral objects filtered by the system_email_smtp_use_ssl column
 * @method     array findBySystemEmailSmtpUsername(string $system_email_smtp_username) Return SettingGeneral objects filtered by the system_email_smtp_username column
 * @method     array findBySystemEmailSmtpPassword(string $system_email_smtp_password) Return SettingGeneral objects filtered by the system_email_smtp_password column
 * @method     array findBySystemEmailFromAccout(string $system_email_from_accout) Return SettingGeneral objects filtered by the system_email_from_accout column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSettingGeneralQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSettingGeneralQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'SettingGeneral', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SettingGeneralQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SettingGeneralQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SettingGeneralQuery) {
			return $criteria;
		}
		$query = new SettingGeneralQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SettingGeneral|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SettingGeneralPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SettingGeneralPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SettingGeneralPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SettingGeneralPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the system_email_smtp_host column
	 * 
	 * @param     string $systemEmailSmtpHost The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterBySystemEmailSmtpHost($systemEmailSmtpHost = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($systemEmailSmtpHost)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $systemEmailSmtpHost)) {
				$systemEmailSmtpHost = str_replace('*', '%', $systemEmailSmtpHost);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_HOST, $systemEmailSmtpHost, $comparison);
	}

	/**
	 * Filter the query on the system_email_smtp_port column
	 * 
	 * @param     int|array $systemEmailSmtpPort The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterBySystemEmailSmtpPort($systemEmailSmtpPort = null, $comparison = null)
	{
		if (is_array($systemEmailSmtpPort)) {
			$useMinMax = false;
			if (isset($systemEmailSmtpPort['min'])) {
				$this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_PORT, $systemEmailSmtpPort['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($systemEmailSmtpPort['max'])) {
				$this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_PORT, $systemEmailSmtpPort['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_PORT, $systemEmailSmtpPort, $comparison);
	}

	/**
	 * Filter the query on the system_email_smtp_use_ssl column
	 * 
	 * @param     int|array $systemEmailSmtpUseSsl The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterBySystemEmailSmtpUseSsl($systemEmailSmtpUseSsl = null, $comparison = null)
	{
		if (is_array($systemEmailSmtpUseSsl)) {
			$useMinMax = false;
			if (isset($systemEmailSmtpUseSsl['min'])) {
				$this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_USE_SSL, $systemEmailSmtpUseSsl['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($systemEmailSmtpUseSsl['max'])) {
				$this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_USE_SSL, $systemEmailSmtpUseSsl['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_USE_SSL, $systemEmailSmtpUseSsl, $comparison);
	}

	/**
	 * Filter the query on the system_email_smtp_username column
	 * 
	 * @param     string $systemEmailSmtpUsername The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterBySystemEmailSmtpUsername($systemEmailSmtpUsername = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($systemEmailSmtpUsername)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $systemEmailSmtpUsername)) {
				$systemEmailSmtpUsername = str_replace('*', '%', $systemEmailSmtpUsername);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_USERNAME, $systemEmailSmtpUsername, $comparison);
	}

	/**
	 * Filter the query on the system_email_smtp_password column
	 * 
	 * @param     string $systemEmailSmtpPassword The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterBySystemEmailSmtpPassword($systemEmailSmtpPassword = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($systemEmailSmtpPassword)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $systemEmailSmtpPassword)) {
				$systemEmailSmtpPassword = str_replace('*', '%', $systemEmailSmtpPassword);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_SMTP_PASSWORD, $systemEmailSmtpPassword, $comparison);
	}

	/**
	 * Filter the query on the system_email_from_accout column
	 * 
	 * @param     string $systemEmailFromAccout The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function filterBySystemEmailFromAccout($systemEmailFromAccout = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($systemEmailFromAccout)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $systemEmailFromAccout)) {
				$systemEmailFromAccout = str_replace('*', '%', $systemEmailFromAccout);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SettingGeneralPeer::SYSTEM_EMAIL_FROM_ACCOUT, $systemEmailFromAccout, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SettingGeneral $settingGeneral Object to remove from the list of results
	 *
	 * @return    SettingGeneralQuery The current query, for fluid interface
	 */
	public function prune($settingGeneral = null)
	{
		if ($settingGeneral) {
			$this->addUsingAlias(SettingGeneralPeer::ID, $settingGeneral->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSettingGeneralQuery
