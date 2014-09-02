<?php

namespace Elastica\Query;

use Elastica\Filter\AbstractFilter;

/**
 * Filtered query. Needs a query and a filter
 *
 * @category Xodoa
 * @package Elastica
 * @author Nicolas Ruflin <spam@ruflin.com>
 * @link http://www.elasticsearch.org/guide/reference/query-dsl/filtered-query.html
 */
class Filtered extends AbstractQuery {

	/**
	 * Query
	 *
	 * @var \Elastica\Query\AbstractQuery Query object
	 */
	protected $_query = null;

	/**
	 * Filter
	 *
	 * @var \Elastica\Filter\AbstractFilter Filter object
	 */
	protected $_filter = null;

	/**
	 * Constructs a filtered query
	 *
	 * @param \Elastica\Query\AbstractQuery   $query  Query object
	 * @param \Elastica\Filter\AbstractFilter $filter Filter object
	 */
	public function __construct(AbstractQuery $query, AbstractFilter $filter) {
		$this->setQuery($query);
		$this->setFilter($filter);
	}

	/**
     * Sets a query
     *
     * @param  \Elastica\Query\AbstractQuery $query Query object
     * @return \Elastica\Query\Filtered      Current object
     */
    public function setQuery(AbstractQuery $query = null)
    {
        return $this->setParam('query', $query);
    }

    /**
     * Sets the filter
     *
     * @param  \Elastica\Filter\AbstractFilter $filter Filter object
     * @return \Elastica\Query\Filtered        Current object
     */
    public function setFilter(AbstractFilter $filter = null)
    {
        return $this->setParam('filter', $filter);
    }

    /**
     * Gets the filter.
     *
     * @return \Elastica\Filter\AbstractFilter
     */
    public function getFilter()
    {
        return $this->getParam('filter');
    }

    /**
     * Gets the query.
     *
     * @return \Elastica\Query\AbstractQuery
     */
    public function getQuery()
    {
        return $this->getParam('query');
    }

	/**
	 * Converts query to array
	 *
	 * @return array Query array
	 * @see \Elastica\Query\AbstractQuery::toArray()
	 */
	public function toArray() {
		$filtered = array();
		if ($this->hasParam('query') && $this->getParam('query') instanceof AbstractQuery) {
			$filtered['query'] = $this->getParam('query')->toArray();
		}

		if ($this->hasParam('filter') && $this->getParam('filter') instanceof AbstractFilter) {
			$filtered['filter'] = $this->getParam('filter')->toArray();
		}

		return array('filtered' => $filtered);
	}

}
