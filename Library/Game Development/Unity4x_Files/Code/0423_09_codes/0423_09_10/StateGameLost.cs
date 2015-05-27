// file: StateGameLost
using UnityEngine;
using System.Collections;

public class StateGameLost : GameState {
	public override void OnStateEntered(){}
	public override void OnStateExit(){}

	public override void StateGUI() {
		GUILayout.Label("state: GAME LOST");
	}
	
	public override void StateUpdate() {	
		print ("StateGameLost::StateUpdate() - would do something here"); 
	}
}
