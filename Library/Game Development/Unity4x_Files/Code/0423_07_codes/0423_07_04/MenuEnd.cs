// file: MenuEnd.cs
using UnityEngine;
using System.Collections;

public class MenuEnd : MonoBehaviour
{
	private void OnGUI() {
		GUILayout.Label("Congratulations " + Player.username);
		GUILayout.Label("You have finished the game, score = " + Player.score);

		bool mainMenuButtonClicked = GUILayout.Button("Main Menu");
		if( mainMenuButtonClicked )
            Application.LoadLevel(0);
    }
}