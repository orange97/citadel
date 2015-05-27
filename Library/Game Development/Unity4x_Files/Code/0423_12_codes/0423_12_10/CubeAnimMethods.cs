// file: CubeAnimMethods.cs
using UnityEngine;
using System.Collections;

public class CubeAnimMethods : MonoBehaviour {
	public void PlayOneShot(AudioClip clip) {
		audio.PlayOneShot(clip);
	}
}