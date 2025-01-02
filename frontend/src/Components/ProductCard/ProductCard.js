import React, { Component } from "react";
import { connect } from "react-redux";
import cart from "../../Images/Cart.svg";
import { addProductToCart } from "../../ReduxStore/CartSlice";
import { Link } from "react-router-dom";
import { toKebabCase } from "../../Utils/functions";

class ProductCard extends Component {
  quickShop = (product) => {
    const { dispatch } = this.props;
    const listOfSelectedAttributes = [];

    if (product.attributes.length) {
      product.attributes.forEach((element) => {
        listOfSelectedAttributes.push({
          attributeSet: element,
          attribute: element.items[0],
        });
      });
      const orderLine = {
        product: product,
        selectedAttributes: listOfSelectedAttributes,
      };
      dispatch(addProductToCart(orderLine));
    } else {
      const orderLine = {
        product: product,
        selectedAttributes: [],
      };
      dispatch(addProductToCart(orderLine));
    }
  };

  render() {
    const { product } = this.props;

    return (
      <div className="card_container">
        {product.inStock && (
          <img
            className="cart_btn"
            src={cart}
            onClick={() => this.quickShop(product)}
            alt=""
          />
        )}
        <Link
          to={"/product/" + product.id}
          style={{ color: "inherit", textDecoration: "inherit" }}
          data-testid={`product-${toKebabCase(product.name)}`}
        >
          <div className="card_content">
            <div className="card_image_container">
              <img className="card_image" src={product.gallery[0]} alt="" />
              {!product.inStock && (
                <p className="in_stock_indicator">Out of stock</p>
              )}
            </div>
            <p className="product_name">{product.name}</p>
            <p className="product_price">
              {product.prices[0].currency.symbol} {product.prices[0].amount}
            </p>
          </div>
        </Link>
      </div>
    );
  }
}

export default connect()(ProductCard);
