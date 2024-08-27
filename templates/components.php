<?php /* Template Name: Components */ ?>

<?php get_header(); ?>

<main class="main-body">


  <div class="container">
    <p class="txt-title">لورم ایپسوم متن ساختگی</p>
    <h1>لورم ایپسوم متن ساختگی</h1>
    <h2>لورم ایپسوم متن ساختگی</h2>
    <h3>لورم ایپسوم متن ساختگی</h3>
    <h4>لورم ایپسوم متن ساختگی</h4>
    <h5>لورم ایپسوم متن ساختگی</h5>
    <p class="txt-caption">لورم ایپسوم متن ساختگی</p>
    <a href="#">لینک تستی</a>
  </div>

  <hr>

  <div class="container" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <h2>container</h2>
  </div>

  <div class="clearfix s-1"></div>

  <div class="container-sm" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <h2>container-sm</h2>
  </div>

  <div class="clearfix s-1"></div>

  <div class="container-md" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <h2>container-md</h2>
  </div>

  <div class="clearfix s-1"></div>

  <div class="container-lg" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <h2>container-lg</h2>
  </div>

  <div class="clearfix s-1"></div>

  <div class="container-xl" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <h2>container-xl</h2>
  </div>

  <div class="clearfix s-1"></div>

  <div class="container-xxl" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <h2>container-xxl</h2>
  </div>

  <div class="clearfix s-1"></div>

  <div class="container-fluid" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <h2>container-fluid </h2>
  </div>

  <hr>

  <div class="container f-row c-6 c-md-4" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <div class="" style="background-color: var(--primary-main); color: var(--contrast-color); border: 1px solid var(--primary-dark);">
      <h3>Column</h3>
    </div>
    <div class="scope-3" style="background-color: var(--primary-main); color: var(--contrast-color); border: 1px solid var(--primary-dark);">
      <h3>Column scope-3</h3>
    </div>
    <div class="" style="background-color: var(--primary-main); color: var(--contrast-color); border: 1px solid var(--primary-dark);">
      <h3>Column</h3>
    </div>
    <div class="" style="background-color: var(--primary-main); color: var(--contrast-color); border: 1px solid var(--primary-dark);">
      <h3>Column</h3>
    </div>
    <div class="" style="background-color: var(--primary-main); color: var(--contrast-color); border: 1px solid var(--primary-dark);">
      <h3>Column</h3>
    </div>
    <div class="" style="background-color: var(--primary-main); color: var(--contrast-color); border: 1px solid var(--primary-dark);">
      <h3>Column</h3>
    </div>
    <div class="scope-2" style="background-color: var(--primary-main); color: var(--contrast-color); border: 1px solid var(--primary-dark);">
      <h3>Column scope-2</h3>
    </div>
  </div>

  <hr>

  <div class="container" style="background-color: var(--secondary-main); color: var(--contrast-color);">
    <?php for ($i = 1; $i <= 16; $i++) : ?>
      <div style="background-color: var(--primary-main);">
        spacing <?= $i ?> - <?= $i * 4 ?>px
      </div>
      <div class="clearfix s-<?= $i ?>"></div>
    <?php endfor; ?>
  </div>

  <hr>

  <div class="container f-row c-auto" style="gap: 0.75rem;">
    <button class="btn" variant="primary">primary</button>
    <button class="btn" variant="secondary">secondary</button>
    <button class="btn" variant="text-primary">text-primary</button>
    <button class="btn" variant="text-secondary">text-secondary</button>
    <button class="btn" variant="text-light">text-light</button>
    <button class="btn" variant="default">default</button>
  </div>

  <hr>

  <div class="container f-row c-auto" style="gap: 0.75rem;">
    <div>
      <input type="text" class="form-control" placeholder="جستجو">
    </div>

    <div class="input-group">
      <button class="btn iconsax" icon-name="search-normal-2"></button>
      <input type="text" class="form-control" variant="search" placeholder="جستجو">
    </div>

    <div>
      <input type="tel" class="form-control f-ltr" placeholder="0930-xxx-xx-xx">
    </div>
  </div>

  <div class="clearfix s-2"></div>

  <div class="container f-row c-auto" style="gap: 0.75rem;">
    <div class="input-label">
      <label for="x01">
        نام خود را وارد کنید:
        <input type="text" id="x01" class="form-control" placeholder="نام">
      </label>
    </div>

    <div class="input-label">
      <label for="x02">
        شهر خود را وارد کنید:
        <select class="form-select" id="x02">
          <option selected>انتخاب کنید</option>
          <option value="1">تهران</option>
          <option value="2">مشهد</option>
        </select>
      </label>
    </div>
  </div>

  <div class="clearfix s-2"></div>

  <div class="container f-row c-auto" style="gap: 0.75rem;">
    <div>
      <input id="x030" type="checkbox" class="form-check">
      <label for="x030">label 0</label>
    </div>

    <div>
      <input id="x040" type="checkbox" class="form-check" disabled>
      <label for="x040">label 0</label>
    </div>

    <div>
      <input id="x031" type="radio" name="y03" class="form-check">
      <label for="x031">label 1</label>
    </div>

    <div>
      <input id="x032" type="radio" name="y03" class="form-check">
      <label for="x032">label 2</label>
    </div>
  </div>

</main>

<?php get_footer(); ?>