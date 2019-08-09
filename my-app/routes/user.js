import React from 'react';
import { Scene, Actions } from 'react-native-router-flux';
import List from '../components/user/List';
import Create from '../components/user/Create';
import Show from '../components/user/Show';
import Update from '../components/user/Update';
import {delayRefresh} from '../utils/helpers';

export default [
          <Scene
              rightTitle="Add"
              onRight={() => Actions.userCreate()}
              key="userList" component={List}
              title="List of Users"
              initial
          />,
          <Scene key="userCreate" component={Create}
                 title="Add a new user"/>,
          <Scene key="userShow" component={Show}
                 title="User"
                 leftTitle="< List of Users"
                 onLeft={() => {
                   Actions.pop();
                   delayRefresh();
                 }}/>,
          <Scene key="userUpdate" component={Update}
                 title="Update User"/>,
];
