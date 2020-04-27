<?php declare(strict_types = 1);

namespace Pyz\Client\PersonalizedProduct\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\FunctionScore;
use Elastica\Query\Match;
use Elastica\Query\MatchAll;
use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\SearchContextTransfer;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;
use Spryker\Client\SearchExtension\Dependency\Plugin\SearchContextAwareQueryInterface;
use Spryker\Shared\Product\ProductConfig;

class PersonalizedProductQueryPlugin implements QueryInterface, SearchContextAwareQueryInterface
{
    private const SOURCE_IDENTIFIER = 'page';

    /** @var SearchContextTransfer */
    private $searchContextTransfer;

    /** @var int */
    private $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }


    public function getSearchQuery(): Query
    {
        $boolQuery = (new BoolQuery())
            ->addMust((new FunctionScore())
                ->setQuery(new MatchAll())
                ->addFunction('random_score', ['seed' => session_id()])
                ->setScoreMode('sum'))
            ->addMust((new Match())
                ->setField(PageIndexMap::TYPE, ProductConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT));

        $query = (new Query())
            ->setSource([PageIndexMap::SEARCH_RESULT_DATA])
            ->setQuery($boolQuery)
            ->setSize($this->limit);

        return $query;
    }

    public function getSearchContext(): SearchContextTransfer
    {
        if (!$this->hasSearchContext()) {
            $this->setupDefaultSearchContext();
        }

        return $this->searchContextTransfer;
    }

    public function setSearchContext(SearchContextTransfer $searchContextTransfer): void
    {
        $this->searchContextTransfer = $searchContextTransfer;
    }

    private function setupDefaultSearchContext(): void
    {
        $searchContextTransfer = new SearchContextTransfer();
        $searchContextTransfer->setSourceIdentifier(static::SOURCE_IDENTIFIER);

        $this->searchContextTransfer = $searchContextTransfer;
    }

    /**
     * @return bool
     */
    private function hasSearchContext(): bool
    {
        return (bool)$this->searchContextTransfer;
    }
}
