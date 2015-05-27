// file: StateGameWon
using UnityEngine;
using System.Collections;

public class StateGameWon : GameState {
	public override void OnStateEntered(){}
	public override void OnStateExit(){}

	public override void StateGUI() {
		GUILayout.Label("state: GAME WON");
	}
	
	public override void StateUpdate() {	
		print ("StateGameWon::StateUpdate() - would do something here"); 
	}
}
