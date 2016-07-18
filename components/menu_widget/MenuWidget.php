<?php
    namespace app\components\menu_widget;

    use app\models\Category;
    use Yii;
    use yii\base\Widget;

    class MenuWidget extends Widget {
        public $tpl;
        public $data;
        public $tree;
        public $menuHtml;

        public function init()
        {
            parent::init();
            // Template names for menu
            $template = ['menu', 'select'];
            if(!in_array($this->tpl, $template)){
                $this->tpl = 'menu';
            }
            $this->tpl .= '.php';
        }

        public function run()
        {
            $menu = Yii::$app->cache->get('categories_menu');
            if($menu) return $menu;

            $this->data = Category::find()->indexBy('id')->asArray()->all();
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            Yii::$app->cache->set('categories_menu', $this->menuHtml, 60 * 60 * 24);
            return $this->menuHtml;
        }

        protected function getTree()
        {
            $tree = [];
            foreach ($this->data as $id => &$node) {
                if (!$node['parent_id']) {
                    $tree[$id] = &$node;
                } else {
                    $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
                }
            }
            return $tree;
        }

        protected function getMenuHtml($tree)
        {
            $str = '';
            foreach ($tree as $category){
                $str .= $this->catToTpl($category);
            }
            return $str;
        }

        protected function catToTpl($category)
        {
            ob_start();
            include __DIR__ . '/tpl/' . $this->tpl;
            return ob_get_clean();
        }
    }