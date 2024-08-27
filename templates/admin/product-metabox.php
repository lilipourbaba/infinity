<?php
$post = $args['post'];
$metaValueStr = get_post_meta($post->ID, "product_size_guide", true);
$metaValue = array();
$lX_tr = 3;
$lY_td = 4;

wp_enqueue_style('cyn-options', get_template_directory_uri() . '/assets/css/cyn-options.css');
$plusIcon  = get_template_directory_uri() . '/assets/img/svg/plus.svg';
$trashIcon = get_template_directory_uri() . '/assets/img/svg/trash-2.svg';
$checkIcon = get_template_directory_uri() . '/assets/img/svg/check.svg';

if (isset($metaValueStr) && strlen($metaValueStr) > 0) {
  $metaValue = json_decode($metaValueStr);
  $lX_tr = count($metaValue);
  $lY_td = count($metaValue[0]);
}
?>

<div class="product-custom-meta" id="product-custom-meta">
  <div class="table">
    <table class="form-table">
      <tbody>
        <?php
        if (count($metaValue) > 0) :
          foreach ($metaValue as $key => $trs) {
            echo "<tr>";
            foreach ($trs as $key => $td) {
              echo "<td><input type='text' value='$td'></td>";
            }
            echo "</tr>";
          }
        else :
        ?>

          <tr>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
          </tr>

          <tr>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
          </tr>

          <tr>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
            <td><input type="text" value=""></td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <div>
      <button class="button " id="product-custom-meta-add-x" title="افزودن ستون جدید">
        <img src="<?php echo $plusIcon; ?>">
      </button>
      <button class="button " id="product-custom-meta-dlt-x" title="حذف ستون آخر">
        <img src="<?php echo $trashIcon; ?>">
      </button>
    </div>
  </div>

  <div class="last">
    <button class="button" id="product-custom-meta-add-y" title="افزودن سطر جدید">
      <img src="<?php echo $plusIcon; ?>">
    </button>
    <button class="button" id="product-custom-meta-dlt-y" title="حذف سطر آخر">
      <img src="<?php echo $trashIcon; ?>">
    </button>
    <button class="button" id="product-custom-meta-apply" title="اعمال تغییرات">
      <img src="<?php echo $checkIcon; ?>">
    </button>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    let metaValue = [];

    const tbody = $("#product-custom-meta tbody");
    const addX = $("#product-custom-meta #product-custom-meta-add-x");
    const deleteX = $("#product-custom-meta #product-custom-meta-dlt-x");
    const addY = $("#product-custom-meta #product-custom-meta-add-y");
    const deleteY = $("#product-custom-meta #product-custom-meta-dlt-y");
    const apply = $("#product-custom-meta #product-custom-meta-apply");

    let lX_tr = <?php echo $lX_tr ?>;
    let lY_td = <?php echo $lY_td ?>;

    const findVals = function() {
      const itemTr = [];
      const trs = $(tbody).children('tr');

      for (let i = 0; i < trs.length; i++) {
        const itemTd = [];
        const tr = trs[i];
        const tds = $(tr).children('td');

        for (let j = 0; j < tds.length; j++) {
          const td = tds[j];
          const tdVal = $(td).children('input').val();
          itemTd.push(tdVal);
        }

        itemTr.push(itemTd);
      }

      return itemTr;
    }

    const setMetaInp = (metaVals) => {
      metaValue = JSON.stringify(metaVals);
      $("#product-custom-meta-inp").val(metaValue);
    }

    $(tbody).find('tr td input').on("change", function(e) {
      setMetaInp(findVals());
    });

    $(apply).on("click", function(e) {
      e.preventDefault();
      setMetaInp(findVals());
    });


    $(addX).on("click", function(e) {
      e.preventDefault();
      $(tbody).children('tr').append(`<td><input type="text" value=""></td>`);
      lY_td++;
      setMetaInp(findVals());
    });

    $(deleteX).on("click", function(e) {
      e.preventDefault();
      if (lY_td > 1) {
        $(tbody).find('tr td:last-child').remove();
        lY_td--;
      }
      setMetaInp(findVals());
    });

    $(addY).on("click", function(e) {
      e.preventDefault();
      $(tbody).append(`<tr></tr>`);
      for (let i = 0; i < lY_td; i++) {
        $(tbody).find('tr:last-child').append(`<td><input type="text" value=""></td>`);
      }
      lX_tr++;
      setMetaInp(findVals());
    });

    $(deleteY).on("click", function(e) {
      e.preventDefault();
      if (lX_tr > 1) {
        $(tbody).find('tr:last-child').remove();
        lX_tr--;
      }
      setMetaInp(findVals());
    });

    setMetaInp(findVals());
  });
</script>