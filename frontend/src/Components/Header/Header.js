import React, { Component } from "react";
import logo from "../../Images/Logo.svg";
import cart from "../../Images/Cart.svg";
import data from "../../Utils/data.json";
import "./Header.css";
import { Link, NavLink } from "react-router-dom";
import { connect } from "react-redux";
import { toggleHideBtn } from "../../ReduxStore/CartSlice";

class Header extends Component {
  constructor(props) {
    super(props);
    this.state = {
      categories: data.data.categories,
      activeCat: "all",
    };
  }

  handleCategoryClick = (categoryName) => {
    this.setState({ activeCat: categoryName });
  };

  render() {
    const { categories, activeCat } = this.state;
    const { cartItemsCount, dispatch } = this.props;

    return (
      <div className="header_container">
        <nav className="header_menu">
          {categories.map((category, index) => (
            <NavLink
              className="header_menu_option"
              key={index}
              to={category.name}
              data-testid={
                activeCat === category.name
                  ? "active-category-link"
                  : "category-link"
              }
              onClick={() => this.handleCategoryClick(category.name)}
            >
              {category.name}
            </NavLink>
          ))}
        </nav>
        <div className="header_logo">
          <Link
            to={"/"}
            style={{ color: "inherit", textDecoration: "inherit" }}
          >
            <img src={logo} alt="" />
          </Link>
        </div>
        <div
          className="header_cart_container"
          onClick={() => dispatch(toggleHideBtn())}
          data-testid="cart-btn"
        >
          <img className="cart" src={cart} alt="" />
          {cartItemsCount > 0 && (
            <p className="cart_items_count" data-testid="cart-count-bubble">
              {cartItemsCount}
            </p>
          )}
        </div>
      </div>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    cartItemsCount: state.cart.order.length,
  };
};

export default connect(mapStateToProps)(Header);
