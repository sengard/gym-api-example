import React from 'react';
import { Scene, Actions } from 'react-native-router-flux';
import List from '../components/exerciseworkout/List';
import Create from '../components/exerciseworkout/Create';
import Show from '../components/exerciseworkout/Show';
import Update from '../components/exerciseworkout/Update';
import {delayRefresh} from '../utils/helpers';

export default [
          <Scene
              rightTitle="Add"
              onRight={() => Actions.exerciseworkoutCreate()}
              key="exerciseworkoutList" component={List}
              title="List of ExerciseWorkouts"
              initial
          />,
          <Scene key="exerciseworkoutCreate" component={Create}
                 title="Add a new exerciseworkout"/>,
          <Scene key="exerciseworkoutShow" component={Show}
                 title="ExerciseWorkout"
                 leftTitle="< List of ExerciseWorkouts"
                 onLeft={() => {
                   Actions.pop();
                   delayRefresh();
                 }}/>,
          <Scene key="exerciseworkoutUpdate" component={Update}
                 title="Update ExerciseWorkout"/>,
];
