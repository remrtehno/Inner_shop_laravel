$(function () {
	$(".all_categories_btn").click(function () {
		$(".product-categories-wrap").toggle();
	});
	$(".typeahead input")
		.autocomplete({
			minLength: 1,
			select: function (event, ui) {
				window.location = "/detail/" + ui.item.slug;
				console.log(event);
			},

			source: function (request, response) {
				console.log(request.term, response);
				$.ajax({
					url: "/api/products",
					dataType: "json",
					data: {
						q: request,
					},
					success: function (data) {
						response(data.success);
					},
				});
			},
			close: function (event, ui) {
				val = $(".typeahead input").val();
				$(".typeahead input").autocomplete("search", val); //keep autocomplete open by
				//searching the same input again
				$(".typeahead input").focus();
				return false;
			},
		})
		.autocomplete("instance")._renderItem = function (ul, item) {
		var img = "no-image.jpg";
		if (item.img) img = item.img;

		return $("<li>")
			.attr("data-value", item.id)
			.append(
				"<img class='search-img' src='/uploads/products/small/" + img + "'>"
			)
			.append(item.article)
			.append(" - ")
			.append(item.batch || '_')
			.append(" - ")
			.append(item.qty || '_')
			.append(" - ")
			.append(item.shop_id ? item.shop_id.split(',').length : '0')
			.appendTo(ul);
	};
});
