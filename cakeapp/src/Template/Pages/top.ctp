<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


/*
if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;
*/
$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<main>
<!----------------------------------------------->
  <div class="container">
    <div class="jumbotron_top mt-4">
        <div class="toptext mt-3">
            <h1 class="display-4 font-weight-bold text-white text-shadow">Hello World</h1>
            <p class="text-white text-shadow font-weight-bold  title">注目のコンテンツや情報に特別な注意を喚起するためのシンプルなコンポーネント。</p>
            <div class="text-right mt-3">
            <a class="btn btn-warning btn-lg text-white font-weight-bold" href="#" role="button">まずは無料登録</a>
            </div>
        </div>
      <video src="img/sample.mp4" autoplay loop muted>
            <img src="images/jewellery.jpg" alt="Placeholder">
        </video>
    </div>

<!----------------------------------------------->
    <section class="mb-5">
      <div class="d-flex flex-column flex-lg-row border border-primary rounded">
        <p class="text-center text-white bg-primary py-2 px-4 mb-0 align-self-stretch">お知らせ</p>
        <p class="py-2 px-2 px-lg-4 mb-0"><span class="d-block d-lg-inline-block mr-lg-4">2018/12/01</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, se.</p>
        <p class="pb-2 py-lg-2 px-2 px-lg-4 ml-auto mb-0"><a href="#" class="icon-link"><i class="fas fa-list-ul mr-2"></i>一覧を見る</a></p>
      </div>
    </section>
  </div><!-- /.container -->
<!----------------------------------------------->
  <section class="py-5 bg-yl-color">
    <div class="container p-3 rounded">
      <h2 class="text-center mb-3"><i class="fas fa-graduation-cap mr-3"></i>SERVICE</h2>
      <div class="text-center">
        <p>テストテストテスト</p>
        <a class="btn btn-warning btn-lg py-3 px-5 text-white font-weight-bold" href="#" role="button">まずは無料登録</a>
      </div>
    </div>
  </section>
<!----------------------------------------------->
  <section id="sec1" class="py-5">
    <div class="container">

      <h2 class="display-4 text-center font-patrick py-3">Bridge</h2>


      </div><!-- /.row -->

    </div><!-- /.container -->
  </section>
</main>


