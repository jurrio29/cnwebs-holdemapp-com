<?php

/**
 * Site meta information and description generator.
 */

class SiteMeta
{
    private array $meta = [];

    public function __construct(string $url, string $keywords)
    {
        $this->meta = [
            'url' => $url,
            'keywords' => $keywords,
            'title' => '德州扑克游戏指南',
            'description' => '提供专业的德州扑克app技巧与策略',
            'author' => 'MetaTeam',
            'language' => 'zh-CN',
            'charset' => 'UTF-8',
        ];
    }

    public function getMeta(string $key): ?string
    {
        return $this->meta[$key] ?? null;
    }

    public function generateDescription(): string
    {
        $parts = [
            '欢迎访问',
            $this->meta['title'],
            '——',
            $this->meta['description'],
            '。',
            sprintf('本站专注于%s领域的深度内容。', $this->meta['keywords']),
            sprintf('更多信息请参考 %s', $this->meta['url']),
        ];
        return implode(' ', $parts);
    }

    public function toArray(): array
    {
        return $this->meta;
    }

    public function htmlMetaTags(): string
    {
        $tags = '';
        $tags .= '<meta charset="' . htmlspecialchars($this->meta['charset'], ENT_QUOTES) . '">' . "\n";
        $tags .= '<meta name="description" content="' . htmlspecialchars($this->generateDescription(), ENT_QUOTES) . '">' . "\n";
        $tags .= '<meta name="keywords" content="' . htmlspecialchars($this->meta['keywords'], ENT_QUOTES) . '">' . "\n";
        $tags .= '<meta name="author" content="' . htmlspecialchars($this->meta['author'], ENT_QUOTES) . '">' . "\n";
        $tags .= '<meta name="language" content="' . htmlspecialchars($this->meta['language'], ENT_QUOTES) . '">' . "\n";
        return $tags;
    }
}

// Example usage (can be removed in production)
$siteMeta = new SiteMeta(
    'https://cnwebs-holdemapp.com',
    '德州扑克app'
);

echo $siteMeta->generateDescription() . "\n\n";
echo $siteMeta->htmlMetaTags();