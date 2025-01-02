import React, { Component } from "react";
import { connect } from "react-redux";
import "./ProdutDetailsPage.css";
import { EmptyAttributesList } from "../../ReduxStore/AttributesSlice";
import { addProductToCart } from "../../ReduxStore/CartSlice";
import parse from "html-react-parser";
import ColorAttribute from "../../Components/PDPComponents/ColorAttribute/ColorAttribute";
import TextAttribute from "../../Components/PDPComponents/TextAttribute/TextAttribute";
import ProductGallery from "../../Components/PDPComponents/ProductGallery/ProductGallery";
import { GET_PRODUCT } from "../../GraphQL/queries";
import { withApollo } from "@apollo/client/react/hoc";
import { withRouter } from "../../Components/HOC/withRouter";

class ProdutDetailsPage extends Component {
  constructor(props) {
    super(props);
    this.state = {
      data: null,
    };
  }

  componentDidMount() {
    const { client, dispatch } = this.props;
    const { id } = this.props.router.params;

    client
      .query({
        query: GET_PRODUCT,
        variables: { id: parseInt(id) },
      })
      .then((result) => {
        this.setState({ data: result.data });
      });

    dispatch(EmptyAttributesList());
  }

  addProduct = () => {
    const { data } = this.state;
    const { dispatch, selectedAttributes } = this.props;

    const orderLine = {
      product: data.product,
      selectedAttributes: selectedAttributes,
    };

    dispatch(addProductToCart(orderLine));
  };

  render() {
    const { data } = this.state;
    const { selectedAttributes } = this.props;

    return (
      <div className="product_page_container">
        {data && (
          <>
            <ProductGallery gallery={data.product.gallery} />
            <div className="product_info">
              <div className="product_info_name">{data.product.name}</div>
              {data.product.attributes.map((attr, index) =>
                attr.type === "text" ? (
                  <TextAttribute
                    attr={attr}
                    key={index}
                    selectedAttr={selectedAttributes}
                  />
                ) : (
                  <ColorAttribute
                    attr={attr}
                    key={index}
                    selectedAttr={selectedAttributes}
                  />
                )
              )}
              <div className="product_info_price">
                <p className="price_tag">Price:</p>
                <p className="price_tag">
                  {data.product.prices[0].currency.symbol}{" "}
                  {data.product.prices[0].amount}
                </p>
              </div>

              <button
                className="add_cart_btn"
                disabled={
                  selectedAttributes.length !==
                    data.product.attributes.length || !data.product.inStock
                }
                onClick={this.addProduct}
                data-testid="add-to-cart"
              >
                ADD TO CART
              </button>

              <div
                className="product_info_description"
                data-testid="product-description"
              >
                {parse(data.product.description)}
              </div>
            </div>
          </>
        )}
      </div>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    selectedAttributes: state.attributes.list,
  };
};

export default withApollo(
  connect(mapStateToProps)(withRouter(ProdutDetailsPage))
);
