import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { ScrollView, View, Text } from 'react-native';
import { List, ListItem } from 'react-native-elements';
import { Actions } from 'react-native-router-flux';
import Spinner from '../Spinner';
import { list, reset } from '../../actions/user/list';
import { success } from '../../actions/user/delete';
import { pagination } from '../../utils/helpers';

class ListComponent extends Component {

  componentDidMount() {
    this.props.reset();
    this.props.list();
  }

  componentDidUpdate(prevProps) {
    if (prevProps.refresh !== this.props.refresh) {
      this.props.list();
    }
  }

  componentWillUnmount() {
    this.props.reset(this.props.eventSource);
  }

  static show(id) {
    Actions.userShow({id});
  }

  static renderRow(item) {
    const {listRowLeft, listRowRight, viewList} = styles;

    return (
        <ListItem
            key={Math.random()}
            onPressRightIcon={() => ListComponent.show(item['@id'])}
            subtitle={
              <View>
                <View style={viewList}>
                  <Text style={listRowLeft}>id</Text>
                  <Text style={[listRowRight, {fontWeight: 'bold'}]}>{item['@id']}</Text>
                </View>
                <View style={viewList}>
                  <Text style={listRowLeft}>id: </Text>
                  <Text style={[listRowRight, {fontWeight: 'bold'}]}>{item['id']}</Text>
                </View>
                <View style={viewList}>
                  <Text style={listRowLeft}>email: </Text>
                  <Text style={[listRowRight, {fontWeight: 'bold'}]}>{item['email']}</Text>
                </View>
              </View>
            }
        />
    );
  }

  render() {
    if (this.props.loading) return <Spinner size="large"/>;

    if (this.props.error) {
      return <View style={ {flex: 1} }>
         <Text style={styles.textStyle}>{this.props.error}</Text>
      </View>;
    }

    return (
        this.props.retrieved && <View style={ {flex: 1} }>
          <ScrollView contentInset={ {top: -24} }
                      automaticallyAdjustContentInsets>
            <List>
              {this.props.retrieved['hydra:member'].map(
                  item => ListComponent.renderRow(item))}
            </List>
          </ScrollView>
          {pagination(this.props.retrieved['hydra:view'], this.props.list)}
        </View>
    );
  }
}

const mapStateToProps = state => {
  const {retrieved, error, loading, eventSource} = state.user.list;
  return {retrieved, error, loading, eventSource};
};

const mapDispatchToProps = dispatch => ({
  list: page => dispatch(list(page)),
  reset: eventSource => dispatch(reset(eventSource)),
});

const styles = {
  viewList: {
    flex: 1,
    overflow: 'hidden',
    flexDirection: 'row',
  },
  listRowLeft: {
    flex: 1,
    borderBottomWidth: 1,
    padding: 5,
    justifyContent: 'flex-start',
    position: 'relative',
    color: 'gray',
    fontSize: 16,
  },
  listRowRight: {
    flex: 1,
    borderBottomWidth: 1,
    padding: 5,
    justifyContent: 'flex-start',
    position: 'relative',
    fontSize: 18,
  },
  textStyle: {
    textAlign: 'center',
    marginTop: 20,
    fontSize: 18,
    color: 'red',
    fontWeight: 'bold',
  },
};

ListComponent.propTypes = {
  error: PropTypes.string,
  loading: PropTypes.bool.isRequired,
  retrieved: PropTypes.object,
  eventSource: PropTypes.object,
  list: PropTypes.func.isRequired,
  reset: PropTypes.func.isRequired,
  refresh: PropTypes.number
};

export default connect(mapStateToProps, mapDispatchToProps)(ListComponent);
