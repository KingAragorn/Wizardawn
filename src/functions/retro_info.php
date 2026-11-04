<?php

/// THIS TAKES CERTAIN INFORMATION AND CONVERTS IT TO WORK WITH A CLASSIC ROLE-PLAYING GAME ///

function retroNotes($word,$game,$level)
{
	if ($game == "Mutant Future")
	{
		$word = str_replace("They have been given the name because they seem to eat xormite whenever they find it", "They survive by biting into, and sucking out, all of the energy from batteries and other power cells", $word);
		$word = str_replace("make a toxin defense test", "save for poison", $word);
		$word = str_replace("failing a toxin defense test", "failing to save for poison", $word);
		$word = str_replace("make a defense test for toxin", "save for poison", $word);
		$word = str_replace("make a defense test for toxins", "save for poison", $word);
		$word = str_replace("makes a defense test for toxins", "saves for poison", $word);
		$word = str_replace("make a defense test for radiation", "save for radiation", $word);
		$word = str_replace("make a defense test against radiation", "save for radiation", $word);
		$word = str_replace("Anyone failing a radiation defense test suffers", "Anyone failing to save for radiation", $word);
		$word = str_replace("make a defense test for energy", "save for energy attacks", $word);
		$word = str_replace("can make an energy defense test", "can save for energy attacks", $word);
		$word = str_replace("must make an energy defense test", "must save for energy attacks", $word);
		$word = str_replace("if they fail an energy defense test", "if they fail to save for energy attacks", $word);
		$word = str_replace("make a shock defense test", "save for stun attacks", $word);
		$word = str_replace("a defense test for shock is required or", "a save for stun attacks is required or", $word);
		$word = str_replace("make a defense test for the mind", "make a willpower check", $word);
		$word = str_replace("can make another test to snap out", "can make another willpower check to snap out", $word);
		$word = str_replace("make a mind defense test", "make a willpower check", $word);
		$word = str_replace("Urthe", "Earth", $word);
		$word = str_replace("xormite", "gold", $word);
	}
	else if (($game == "Millenniums & Mutations 5th Edition") || ($game == "Millenniums & Mutations 7th Edition"))
	{
		$word = str_replace("  ", " ", $word);
		$word = str_replace("They have been given the name because they seem to eat xormite whenever they find it", "They feed off of energy as they seem to eat puxulite whenever they find it", $word);
		$word = str_replace("1d8", "1d6", $word);
		$word = str_replace("1d4", "1d6", $word);
		$word = str_replace("1d10", "1d6", $word);
		$word = str_replace("1d12", "1d6", $word);
		$word = str_replace("They gain +3 to the first round of initiative and are able to remain hidden within trees and other plants.", "They almost always get a surprise attack as they are able to remain hidden within trees and other plants.", $word);
		$word = str_replace("They have a +1 to their initiative", "They almost always get a surprise attack", $word);
		$word = str_replace("They also get a +2 to initiative", "They almost always get a surprise attack", $word);
		$word = str_replace("gain a +3 to initiative", "gets a surprise attack", $word);
		$word = str_replace("so it will have a +2 to initiative during the first round", "giving them a surprise attack", $word);
		$word = str_replace("They are fast gaining a +1 to their initiative rolls", "They almost always get a surprise attack", $word);
		$word = str_replace("giving it +1 to initiative during the first round of combat.", "giving them a surprise attack almost every time.", $word);
		$word = str_replace("One must make a toxin defense test or suffer double damage.", "They will use their poison stinger if they DICE. This poison will cause the victim to suffer a negative HURT to STR unless they can make a SAVE vs. CON. The `ant poison` will last an entire day unless cured and does not stack in effect. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects.", $word);
		$word = str_replace("Anyone hit by the stinger must make a toxin defense test or suffer double damage.", "They will use their poison stinger if they DICE. This poison will cause the victim to suffer a negative HURT to STR unless they can make a SAVE vs. CON. The `ant poison` will last an entire day unless cured and does not stack in effect. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects.", $word);
		$word = str_replace("If they are not removed, they will drain the victim`s blood causing 1d6 damge per round.", "They will attach themselves to a target if they DICE. They will then begin to suck the blood of the victim unless they can make a SAVE vs. STR to get it off. Anyone getting blood drained will suffer HURT points of damage per combat round. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to attach to. Anyone attacking this creature while attached will hurt the victim as well. The victim may attempt to make a SAVE vs. STR each round to try and remove the creature. Anytime this creature is attached to someone, it no longer attacks normally but continues to drain blood.", $word);
		$word = str_replace("They can breathe fire up to 6` away.", "They will use their fire breath if they DICE. This breath will automatically do HURT points of damage to everyone in front of the dragon unless the targets can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("It can breathe fire up to 20` away.", "They will use their fire breath if they DICE. This breath will automatically do HURT points of damage to everyone in front of the dragon unless the targets can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("They do not use this ability too often as they save this deadly strike for wooden boats. The flame will consume a 20 feet area and cause 1d6 damage for 1d6 rounds.", "They will use their fire breath if they DICE. This breath will automatically do HURT points of damage to everyone in front of the dragon unless the targets can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("It can breath fire up to 10` away, but will only do this attack about 35% of the time.", "They will use their fire breath if they DICE. This breath will automatically do HURT points of damage to everyone in front of the dragon unless the targets can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("They usually attack with horns but may spit 25% of the time. The spit is heavily irradiated and anyone hit with it must make a defense test for radiation or suffer double damage.", "They will spit radioactive goo if they DICE. This goo will cause the victim to suffer HURT points of damage unless they can make a SAVE vs. LCK or SPD. Each target that gets damaged from the attack rolls 1 die to determine which one is hit with the goo, where the lowest number suffers from the effects.", $word);
		$word = str_replace("They drool of black oil that they may spit at a victim`s feet. Anyone this happens to must make a successful agility test or fall from the slickness.", "They will drool black oil at the target`s feet if they DICE. This oil will cause the victim to slip and fall unless they can make a SAVE vs. LCK or SPD. Once on the ground, the victim loses the next HURT combat rounds trying to stand back up.", $word);
		$word = str_replace("make a defense test for toxins or they will become a fungoid over the period of one month.", "make a SAVE vs. STR or CON or they will become a fungoid over the period of one month.", $word);
		$word = str_replace("On a successful hit, there is a 20% chance that a muskito can hang onto its prey to drink. When this happens, the victim must make a shock defense test or be knocked unconscious. The Muskito will do 1d6 damage per round as it drinks blood. When the victim runs out of stamina, the blood is all drained and the Muskito flies away.", "They will attach themselves to a target if they DICE. They will then begin to suck the blood of the victim unless they can make a SAVE vs. STR to get it off. Anyone getting blood drained will suffer HURT points of damage per combat round. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to attach to, where the lowest number is the one it attaches to. Anyone attacking this creature while attached will hurt the victim as well. The victim may attempt to make a SAVE vs. STR each round to try and remove the creature. Anytime this creature is attached to someone, it no longer attacks normally but continues to drain blood.", $word);
		$word = str_replace("The thorns have venom in them and have a 25% chance of putting its prey to sleep for 2d8 rounds. It attempts to do this so it can wrap its limbs around the prey and begin to dissolve the tissue for food. This sleeping effect can be avoided if the victim can make a defense test for toxins.", "They will use their poison thorns if they DICE. This poison will cause the victim to fall asleep for HURT combat rounds unless they can make a SAVE vs. CON. It attempts to do this so it can wrap its limbs around the prey and begin to dissolve the tissue for food. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects.", $word);
		$word = str_replace("If one does maximum damage (during their attack round) to the hydra, then a head is severed, destroyed, or disabled.", "", $word);
		$word = str_replace("They have long sticky tongues that they use to cause their opponents to fall off their feet.", "They will use their tongue to grab the feet of a target if they DICE. Each target that gets damaged from the attack rolls 1 die to determine which one falls, where the lowest number trips to the ground. It will take HURT combat rounds for the victim to get to their feet, missing combat rounds until then.", $word);
		$word = str_replace("They have four arms which allow them to perform two attacks per round when they are not holding a weapon.", "", $word);
		$word = str_replace("They are very aggressive but fear any type of fire, which can cause them to take triple damage.", "These creatures regenerate 10 damage points every combat round unless they were attacked by some fire based spell or weapon.", $word);
		$word = str_replace("Anyone bit by this creature must make an energy defense test or suffer double damage.", "They will use an electrical shock if they DICE. This shock will stun everyone near the eel for HURT rounds unless they can make a SAVE vs. CON.", $word);
		$word = str_replace("They will release an electrical discharge about 40% of the time causing 1d6 damage. If a victim can make an energy defense test, they will only suffer half damage from the shock.", "They will use an electrical discharge if they DICE. This shock will stun everyone near the eel for HURT rounds and cause an additonal HURT damage unless they can make a SAVE vs. CON.", $word);
		$word = str_replace("One must make a mind defense test or they will be forced to slowly approach the plant. Once in range, the plant will open up and wrap around the victim, digesting them in 3d6 rounds. During this time, the victim will take 1d6 damage per round. They may attempt to make a strength test each round to see if they break free.", "They will use their eerie glow if they DICE. They will then use this hypnotic glow to draw a victim toward them unless they can make a SAVE vs. INT. Anyone getting near it will then get wrapped up by the plant and suffer HURT points of damage per combat round. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to attract, where the lowest number is the one hypnotized. Anyone attacking this creature while attached will hurt the victim as well. The victim may attempt to make a SAVE vs. STR each round to try and break free from it. Anytime this creature has someone wrapped up, it no longer attacks normally but continues to digest it`s prey.", $word);
		$word = str_replace("They usually attack with their pinchers but will shoot a beam of energy from their tail when out of range. This beam is bright red in color and comes from the tip of their stinger. They have no venom and do not use their tail to puncture. The beam of energy is powerful though and anyone hit by it must make a defense test for energy or take double damage from the attack.", "They usually attack with their pinchers but will shoot a beam of energy if they DICE. This beam is bright red in color and comes from the tip of their stinger. They have no venom and do not use their tail to puncture. This beam will automatically do HURT points of damage to the target unless they can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round. Each target that gets damaged from the attack rolls 1 die to determine which one is hit by the beam, where the lowest number is hit with the beam.", $word);
		$word = str_replace("To accommodate this, they can launch a quill up to 150` away. Anyone hit with this quill will take 1d6 points of damage but must also make a defense test for toxins. If they fail then they will fall asleep for 2d4 rounds. This allows the Porcubus to capture its prey. There is a 10% chance that anyone landing a melee attack on these creatures will be stuck with a quill.", "To accommodate this, they can launch a quill if they DICE. This quill poison will cause the victim to fall asleep for HURT rounds unless they can make a SAVE vs. CON. This allows the Porcubus to capture its prey. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects. There is also a 1 in 6 chance that anyone landing a melee attack on these creatures will be stuck with a quill.", $word);
		$word = str_replace("They will often attempt to bite their prey but will use their icy breathe attack if needed. Anyone hit with this breathe attack must make a defense test for energy or be frozen for 1d6 rounds.", "They will use their ice shard breath if they DICE. This breath will automatically do HURT points of damage to everyone in front of the dragon unless the targets can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("The bite of a Jaw Lock is also poisonous. The poison is far from lethal, but it will affect the nervous system. Just scraping the teeth of these creatures will cause paralysis unless the victim makes a defense test for toxins. If they fail, they will be paralyzed for 1d6 rounds.", "The bite of a Jaw Lock is also poisonous if they DICE. The poison is far from lethal, but it will affect the nervous system. This venom will cause the victim to be paralyzed for HURT rounds unless they can make a SAVE vs. CON. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the venom, where the lowest number suffers from the effects.", $word);
		$word = str_replace("They are able to attack twice with their multiple arms.", "", $word);
		$word = str_replace("They are able to perform a shriek attack once per day. They will only resort to this if their stamina is below half. The shriek will affect a 10` radius and anyone caught in it will need to make a shock defense test or suffer 1d6 points of sonic damage. This also causes the victim to be deafened for 1d6+4 rounds.", "They will use their scream attack if they DICE. This will cause everyone to suffer deafness for HURT rounds and suffer HURT sonic damage unless they can make a SAVE vs. LCK. A SAVE vs. SPD can also be made to see if ears are covered in time.", $word);
		$word = str_replace("Anyone hit with the tusks must make a defense test for toxins or suffer 1d6 damage per round from the venom. This will keep happening until the poison is cured.", "They will use their poison tusks if they DICE. This poison will cause the victim to suffer HURT damage per combat round unless they can make a SAVE vs. CON. This will keep happening until the poison is cured. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects.", $word);
		$word = str_replace("They will wrap around their prey and latch onto them to drain their blood until the victim is dead. If they are successfully hit by an attack, they will release their victim and try to latch on again. Each round, they are sucking blood, will cause 1d6 points of damage. One can also set themselves free with a successful strength test.", "They will attach themselves to a target if they DICE. They will then begin to suck the blood of the victim unless they can make a SAVE vs. STR to get it off. Anyone getting blood drained will suffer HURT points of damage per combat round. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to attach to. Anyone attacking this creature while attached will hurt the victim as well. The victim may attempt to make a SAVE vs. STR each round to try and remove the creature. Anytime this creature is attached to someone, it no longer attacks normally but continues to drain blood.", $word);
		$word = str_replace("Anyone bitten by them will need to make a defense test for toxins or become like them in 3d6 hours (attacking anyone that is not infected).", "Anyone damaged by them will need to make a SAVE vs. CON or become like them in 3d6 hours (attacking anyone that is not infected). Each target that gets damaged from the attack rolls 1 die to determine which one is infected, where the lowest number suffers from the effects.", $word);
		$word = str_replace("Anyone gazing on these creatures must make a defense test for the mind or be hypnotized. They can make another test to snap out of it each round.", "These glowing creatures float around and only come out at night. From a distance it will always seem to look like a lantern being held. If they are not discovered as being wisps, they will attempt to lure adventurers to their death and then consume their souls. If this happens, they can never be resurrected.", $word);
		$word = str_replace("There is a 30% chance the eyes will change color to a bright red. Anyone gazing the eyes must make a defense test for the mind or become paralyzed by them. This gives the serpent an automatically successful attack on that victim during the next round.", "Their eyes will turn red if they DICE, hypnotizing one into paralysis unless they can make a SAVE vs. INT. Paralyzation lasts for HURT rounds. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to hypnotize, where the lowest number is the one hypnotized.", $word);
		$word = str_replace("They can see in complete darkness and will suffer a -4 penalties to attack when light is in the area.", "They can see in complete darkness and cannot use their adds in combat when light is in the area.", $word);
		$word = str_replace("Anyone bitten must make a defense test against radiation or suffer from radiation sickness for 1d6 weeks. This sickness causes one to suffer a 2 penalty to all die rolls but can be cured by a toxshot.", "They will cause radiation sickness if they DICE. This illness will last for 1d6 weeks unless they can make a SAVE vs. STR or CON. The illness causes the victim to be unable to use any adds during combat. Each target that gets damaged from the attack rolls 1 die to determine which one is affected with the illness, where the lowest number suffers from the effects.", $word);
		$word = str_replace("They have two heads with each controlling one arm and thus able to attack twice per round with each weapon.", "", $word);
		$word = str_replace("They will produce an electrical shock 35% of the time. They do this to try and stun their prey before eating. This electrical shock will affect a 20` area from the shockeel and a defense test for shock is required or the victim is stunned for 1d6 rounds.", "They will use an electrical shock if they DICE. This shock will stun everyone near the eel for HURT rounds unless they can make a SAVE vs. CON.", $word);
		$word = str_replace("They are very sensitive to bright light and they would suffer a 4 penalty to attacks if exposed to it.", "They are very sensitive to bright light and cannot use their adds in combat when light is in the area.", $word);
		$word = str_replace("Once a day they are able to release a toxic spray at a single target. There is a 20% chance they will resort to this attack. Anyone hit with this spray must make a defense test for toxins or suffer 2d4 damage.", "They will release a toxic spary if they DICE. This disease will cause the victim to suffer HURT damage unless they can make a SAVE vs. LCK or SPD. Each target that gets damaged from the attack rolls 1 die to determine which one is hit with the spray, where the lowest number suffers from the effects.", $word);
		$word = str_replace("These large bats will latch on to its prey if they succeed at biting. If they are not removed, they will drain the victim`s blood causing 1d6 damge per round.", "They will attach themselves to a target if they DICE. They will then begin to suck the blood of the victim unless they can make a SAVE vs. STR to get it off. Anyone getting blood drained will suffer HURT points of damage per combat round. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to attach to, where the lowest number is the one it attaches to. Anyone attacking this creature while attached will hurt the victim as well. The victim may attempt to make a SAVE vs. STR each round to try and remove the creature. Anytime this creature is attached to someone, it no longer attacks normally but continues to drain blood.", $word);
		$word = str_replace("They attack with an acid spray that will destroy items 30% of the time.", "They will use their acid spray if they DICE. This spray will automatically do HURT points of damage to everyone in front of the creature unless the targets can make a SAVE vs. LCK or SPD. Armor and weapons might be destroyed. To determine this, roll 1 die for each weapon and/or armor. A roll of 1 means it was destroyed by the acid. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("electrical jolt causing 1d6 damage if they fail an energy defense test. They only discharge this electricity about 50% of the time.", "electrical jolt causing 1d6 damage.", $word);
		$word = str_replace("If one is hit from this creature, they must make a defense test for toxins or be paralyzed for 1d6 rounds.", "They will paralyze a target if they DICE unless they can make a SAVE vs. CON. This paralysis lasts for HURT rounds. Each target that gets damaged from the attack rolls 1 die to determine which one is paralyzed, where the lowest number suffers from the effects.", $word);
		$word = str_replace("Anyone stung by the hornet must make a defense test for toxin or be paralyzed for 1d6 rounds.", "They will use their poison stinger if they DICE. This poison will cause the victim to die unless they can make a SAVE vs. CON. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects.", $word);
		$word = str_replace("Anyone hitting it with fists or melee weapons will suffer 1d6 damage from the quills.", "Anyone hitting it with fists or melee weapons will suffer 1d6 damage from the quills.", $word);
		$word = str_replace("There is a 20% chance it will use their beam attack from their eyes. Anyone hit with this beam will be frozen in ice where one must make a successful medicine test to thaw them out.", "They will use their freezing beam from their eyes if they DICE. This will encase the target in a block of ice unless they can make a SAVE vs. LCK or SPD. Each target that gets damaged from the attack rolls 1 die to determine which one is hit by the bolt, where the lowest number suffers the effects. They can eventually be thawed out.", $word);
		$word = str_replace("Anyone striking it with fists or melee weapons will be stuck with mucus, slowing them down and causing a penalty of 2 to all die rolls.", "Anyone striking it with fists or melee weapons will be stuck with mucus, slowing them down and causing a penalty of HURT to all combat and saving rolls.", $word);
		$word = str_replace("Anyone stung by the creature must make a defense test for toxin or be die from the poison in 1d6 rounds.", "They will use their poison stinger if they DICE. This poison will cause the victim to die unless they can make a SAVE vs. CON. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects.", $word);
		$word = str_replace("There is a 20% chance they will spray an opponent with a gasoline type substance. If anyone gets covered in this fluid, the toad will then attempt to fire a laser beam from their eyes to ignite the flame, which is considered another range attack.", "They will spray gasoline from their mouth if they DICE. This gasoline will then be ignited by a red beam of light from the creature`s eyes. Anyone in the are will suffer HURT damage unless they can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("It will attack with its tongue but only to bring its prey into its mouth, where the bite does damage. A strength test must succeed for the victim to free themselves from the sticky tongue.", "They will use their sticky tongue to bring a victim to their mouth if they DICE. Each target that gets damaged from the attack rolls 1 die to determine which one is caught. They can only free themselves if they can make a SAVE vs. STR.", $word);
		$word = str_replace("There is a 30% chance they will spray an opponent that will cause blindness for 2d4 rounds unless the victim can make an agility test.", "They will spray an opponent if they DICE. This spray will cause blindness for HURT rounds unless they can make a SAVE vs. LCK or SPD. Each target that gets damaged from the attack rolls 1 die to determine which one is sprayed, where the lowest number stinks.", $word);
		$word = str_replace("There is a 30% chance they will spray an opponent that will cause blindness for 1d6 rounds unless the victim can make an agility test.", "They will spray an opponent if they DICE. This spray will cause blindness for HURT rounds unless they can make a SAVE vs. LCK or SPD. Each target that gets damaged from the attack rolls 1 die to determine which one is sprayed, where the lowest number stinks.", $word);
		$word = str_replace("Anyone caught in a squeeze attack must make a successful strength test or will continue to remain in the snake`s grasp, taking another 1d6 damage.", "They will grab and constrict a target if they DICE unless the target can make a SAVE vs. STR to stop it. Anyone held by this creature takes all of the combat damage dealt each combat round. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to constrict, where the lowest number is the one it grabs. The victim may attempt to make a SAVE vs. STR each round to try and escape the creature.", $word);
		$word = str_replace("Anyone bitten must make an agility test or be swallowed whole, where they will suffer 1d6 damage each round until they are freed or they free themselves.", "They will swallow a target whole if they DICE and the victim fails a SAVE vs. SPD or LCK. While inside, the victim will suffer HURT points of damage each combat round, but they can continue to attack as normal. Each target that gets damaged from the attack rolls 1 die to determine which one is swallowed, where the lowest number gets swallowed.", $word);
		$word = str_replace("Their eyes will light up when it sees potential prey.  Anyone looking at the fish must make a defense test for the mind or by hypnotized and cannot move.  The fish then waits for either the creature to drown or they will simply start eating it while in this state.  One can make another mind defense test each round to snap out of it.", "Their eyes will light up if they DICE, hypnotizing one into paralysis unless they can make a SAVE vs. INT. The fish then waits for either the creature to drown or they will simply start eating it while in this state. Each target that gets damaged from the attack rolls 1 die to determine which one it tries to paralyze, where the lowest number is the one paralyzed. One can make a SAVE vs. INT each round to try and snap out of it.", $word);
		$word = str_replace("Anyone hit by a tentacle must make a strength test or be pulled into the creature`s mouth. They will suffocate in 1d6+5 rounds unless they can free themselves. They can attack from the inside if they can make a strength test that round, and the attack they make is an automatic hit.", "They will use their tentacle to pull someone into their mouth if they DICE unless they can make a SAVE vs. LCK or STR. They will suffocate in 1d6+5 rounds unless they can free themselves by making a SAVE vs. STR each round. Each target that gets damaged from the attack rolls 1 die to determine which one is pulled into the mouth.", $word);
		$word = str_replace("Anyone bitten by this creature must make a defense test for toxins or die within 1d6 rounds.", "Anyone bitten by this creature will die in 1d6 rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone bitten by this creature must make a defense test for toxins or die within 1d6+2 rounds.", "Anyone bitten by this creature will die in 1d6 rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone bit will need to make a defense test for toxins or die within 1d6 rounds.", "Anyone bitten by this creature will die in 1d6 rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone bitten by the creature must make a defense test for toxins or suffer double damage.", "Anyone bitten by this creature will suffer HURT damage from poison unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("If anyone is struck by their stinger, they must make a toxin defense test or suffer double damage.", "Anyone stung by this creature will suffer HURT damage from venom unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone stung by this beast must make a defense test for toxin or die within 1d6 rounds.", "Anyone stung by this creature will die in 1d6 rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone bitten must make a defense test against toxin or be paralyzed for 1d6 rounds.", "Anyone bitten by this creature will be paralyzed for HURT rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Those it bites must make a toxin defense test or become paralyzed for 1d6 rounds.", "Anyone bitten by this creature will be paralyzed for HURT rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone hit by the creature must make an agility test to see if they are in the creature`s grasp. They must make strength tests until they free themselves and cannot attack while being held.", "They will use their tentacle to grab someone if they DICE unless they can make a SAVE vs. LCK or STR. They will immobolize a victim unless they can free themselves by making a SAVE vs. STR each round. Each target that gets damaged from the attack rolls 1 die to determine which one is wrapped up.", $word);
		$word = str_replace("This lizard is made of icy scales and can spit a liquid that will freeze their victims feet to where they stand. There is only a 20% chance they will use this attack and mostly if their victim tries to flee", "This lizard is made of icy scales and can spit a liquid that will freeze their victims feet to where they stand. There is only a 1 in 6 chance they will use this attack and mostly if their victim tries to flee", $word);
		$word = str_replace("Anyone disturbing the mold will release spores where anyone within a 10` area must make a defense test for toxins or die.", "Anyone disturbing the mold will release spores where anyone within a 10` area will die unless they can make a SAVE vs. STR or CON.", $word);
		$word = str_replace("Anyone bitten by this creature must make a defense test for toxins or die within 1d6+2 rounds.", "Each target that gets damaged from the attack rolls 1 die to determine if they are infected with poison, where the lowest number will die in 1d6 rounds from it unless they can make a SAVE vs. STR or CON.", $word);
		$word = str_replace("They do not attack but if one touches their tentacles without protection, they must make a toxin defense test or be paralyzed for 1d6 rounds. After the 1d6 rounds, they must make another test unless they are somehow dragged away from it. Every round they are touching the creature, they suffer 1d6 damage from being digested.", "They do not attack but if one touches their tentacles without protection, they must make a SAVE vs. CON or STR or be paralyzed for 1d6 rounds. After the 1d6 rounds, they must make another SAVE vs. CON or STR unless they are somehow dragged away from it. Every round they are touching the creature, they suffer 1d6 damage from being digested.", $word);
		$word = str_replace("It will attempt to grab a creature and wrap itself around it to suffocate them. Once dead (death occurs in 1d6+5 rounds), the creature`s body will produce a chemical to break down the corpse to absorb. One can attempt a strength test each round to try and break free.", "They attempt to grab a target if they DICE and suffocate (death occurs in 1d6+5 rounds) them unless they can make a SAVE vs. LCK or STR. The creature`s body will produce a chemical to break down the corpse to absorb. One can attempt a SAVE vs. STR each round to try and break free. Each target that gets damaged from the attack rolls 1 die to determine which one is wrapped up, where the lowest number is caught.", $word);
		$word = str_replace("Anyone bitten must make a defense test for toxin or die in 1d6 round.", "Anyone bitten by this creature will die in 1d6 rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone bit will need to make a defense test for toxins or die within 1d6 rounds.", "Anyone bitten by this creature will die in 1d6 rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("Anyone bit will need to make a defense test for toxins or be paralyzed for 1d6 rounds. Any web a victim is caught in can only be escaped from a successful strength test.", "Their bite will be poisonous if they DICE. This poison will cause the victim to die unless they can make a SAVE vs. CON. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects. If one makes their SR for this poison, they are instead wrapped in a sticky web where they must reduce their combat dice by half (rounded up) until they can free themselves. Making a SAVE vs. STR will accomplish this.", $word);
		$word = str_replace("Anyone bit will need to make a defense test for toxins or be paralyzed for 1d6 rounds. Any web a victim is caught in can only be escaped from a successful strength test.", "Their bite will be poisonous if they DICE. This poison will cause the victim to die unless they can make a SAVE vs. CON. Each target that gets damaged from the attack rolls 1 die to determine which one is infected with the poison, where the lowest number suffers from the effects. If one makes their SR for this poison, they are instead wrapped in a sticky web where they must reduce their combat dice by half (rounded up) until they can free themselves. Making a SAVE vs. STR will accomplish this.", $word);
		$word = str_replace("Anyone bit will need to make a defense test for toxins or be paralyzed for 1d6 rounds.", "Anyone bitten by this creature will be paralyzed for HURT rounds unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("These large orange spiders secrete an amber like substance that they often spit at their prey`s feet to keep them still (30% of the time).", "These large orange spiders secrete an amber like substance if they DICE. This will coat the feet of the victim unless they can make a SAVE vs. LCK or SPD. This attack is in addition to any other damage during that round. The substance will keep the victim in place and they cannot move anywhere.", $word);
		$word = str_replace("Anyone bitten must make a defense test for radiation. If affected by the radiation sickness, the victim will not be able to recover any Stamina until a toxshot is applied.", "Anyone bitten by this creature will suffer from radiation sickness unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected. If affected by the radiation sickness, the victim will not be able to recover any constitution until a toxshot is applied.", $word);
		$word = str_replace("Anyone that gets close to them will need to make a defense test for radiation or suffer 1d6 damage per round.", "Anyone that gets close to them will need to make a SAVE vs. STR or CON or suffer 1d6 radiation damage per round.", $word);
		$word = str_replace("They have 4 arms that allow them to attack twice per round.", "", $word);
		$word = str_replace("50%", "1 in 6", $word);
		$word = str_replace("They will always bite unless their enemy is out of range. If the enemy is out of range, they will shoot a beam of red energy from their eyes up to a range of 60`. If one is hit by this beam, they must make a defense test for energy or take double damage. If one does maximum damage (during their attack round) to the dydra, then a head is severed, destroyed, or disabled.", "They will shoot laser beams from their eyes if they DICE. This beam will automatically do HURT points of damage to everyone in front of the creature unless the targets can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("Anyone it hits with slime must make a defense test for toxins or suffer from paralysis for 1d6 rounds. The slime will attempt to coat the victim and break down the body to absorb.", "They will cover a target in slime if they DICE and the victim fails a SAVE vs. SPD or LCK. While slimed, the victim will be paralyzed for HURT rounds. Each target that gets damaged from the attack rolls 1 die to determine which one is slimed, where the lowest number gets covered. The slime will attempt to coat the victim and break down the body to absorb within 1d6 hours.", $word);
		$word = str_replace("Anyone failing a toxin defense test will swell up for 2d4 hours and must remove all clothing to keep from suffocating. A toxshot can reduce this time by 1d6 hours.", "Anyone stung by this creature will swell up for 2d6 hours and must remove all clothing to keep from suffocating. They can make a SAVE vs. STR or CON to avoid this. Each target that gets damaged from the attack rolls 1 die to determine which one is affected. A toxshot can reduce this time by 1d6 hours.", $word);
		$word = str_replace("If one is sprayed by this creature`s fire, they will only suffer damage by the flames if they cannot make a defense test for energy.", "They will use their fire spray if they DICE. This spray will automatically do HURT points of damage to everyone in front of the ant unless the targets can make a SAVE vs. LCK or SPD. This attack damage is in addition to any other damage during that round.", $word);
		$word = str_replace("One must make a mind defense test or suffer this fate. If they are taken control of, they may make another test every 6 hours.", "They will use this mind control ability if they DICE and only if the victim cannot make a SAVE vs. INT. If controlled, the victim can make a SAVE vs. INT every 6 hours to try and snap out of it. Each target that gets damaged from the attack rolls 1 die to determine which one is controlled. This attack is in addition to any other damage during that round.", $word);
		$word = str_replace("Anyone failing a radiation defense test suffers twice the amount of damage. They also suffer from radiation sickness for 1d6 weeks. This sickness causes one to suffer a 1 penalty to all die rolls but can be cured by a toxshot.", "Anyone bitten by this creature will suffer radiation sickness unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected. The illness lasts 1d6 weeks and can be cured with a toxshot. While ill, the victim cannot use any combat adds.", $word);
		$word = str_replace("There is a 20% chance they will spit irradiated venom at a victim. A successful hit means the victim must make a defense test for radiation or suffer a -4 to strength and endurance for 3d6 turns. This condition is not cumulative.", "They will use their radioactive spit if they DICE. The victime will suffer radiation sickness unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected. The illness lasts 1d6 days and can be cured with a toxshot. While ill, the victim suffers -4 to STR and SPD.", $word);
		$word = str_replace("One must make a defense test for toxins or take double damage from this liquid.", "They will spray this liquid if they DICE. Anyone sprayed by this creature will suffer HURT damage unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is affected.", $word);
		$word = str_replace("The horn can also fire a plasma beam of energy at opponents. The unicorn will only use the beam when enemies are not within reach, as the use of the beam tires the creature.", "They will fire a plasma beam from their horn if they DICE. Anyone hit with this beam will suffer HURT damage unless they can make a SAVE vs. LCK or SPD. Each target that gets damaged from the attack rolls 1 die to determine which one is hit.", $word);
		$word = str_replace("Anyone bitten by these creatures, and lives, will become a vampere in about a week.", "They will infect someone with vamperism if they DICE. Anyone suffering from this will turn into a vampere in about 1d6 days unless they can make a SAVE vs. STR or CON. Each target that gets damaged from the attack rolls 1 die to determine which one is infected.", $word);
		$word = str_replace("If they are not discovered as being wisps, they will attempt to lure adventurers to their death and then consume their souls. If this happens, they can never be resurrected. The wisp will attempt to lead the prey in a direction that may cause their death (off a cliff, down a deep hole, etc.). Once they are dead, the wisp will consume the corpse within its light leaving only bones (or exoskeletons) behind.", "If they are not discovered as being wisps, they will attempt to lure adventurers to their death and then consume their souls unless a SAVE vs. INT can be achieved. The wisp will attempt to lead the prey in a direction that may cause their death (off a cliff, down a deep hole, etc.). Once they are dead, the wisp will consume the corpse within its light leaving only bones (or exoskeletons) behind.", $word);
		$word = str_replace("A victim must make a defense test for radiation or take double damage from the bite.", "Anyone fighting near the worm must make a SAVE vs CON or STR or suffer 1d6 damage per round from the radiation.", $word);
		$word = str_replace("Urthe", "Zendynn", $word);
		$word = str_replace("xormite", "puxulite", $word);
	}
	else if ($game == "Metamorphosis Alpha")
	{
		if ($level < 3){$level = 3;} else if ($level > 18){$level = 18;}
		$word = str_replace("They have been given the name because they seem to eat xormite whenever they find it", "They survive by biting into, and sucking out, all of the energy from various power cells", $word);
		$word = str_replace("make a toxin defense test", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("failing a toxin defense test", "failing to resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for toxins", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("makes a defense test for toxins", "resists the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for toxin", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test against toxin", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for radiation", "resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test against radiation", "resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("Anyone failing a radiation defense test suffers", "Anyone failing to resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for energy", "resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("can make an energy defense test", "can resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("must make an energy defense test", "must resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("if they fail an energy defense test", "if they fail to resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("make a shock defense test", "roll equal or under their constitution on 1d20", $word);
		$word = str_replace("a defense test for shock is required or", "a roll equal or under their constitution on 1d20 or", $word);
		$word = str_replace("make a defense test for the mind", "resist the mind effect (power&nbsp;" . $level . ")", $word);
		$word = str_replace("can make another test to snap out", "can try to resist the mind effect (power&nbsp;" . $level . ") again to snap out", $word);
		$word = str_replace("make a mind defense test", "resist the mind effect (power&nbsp;" . $level . ")", $word);
		$word = str_replace("This is a creature from Urthe`s ancient past that once were extinct, but have somehow reappeared in recent centuries.", "This is a creature from the days of the old world that once were extinct, but have somehow reappeared recently.", $word);
		$word = str_replace("This is a creature from Urthe`s past that still exists today.", "This is a creature from the days of the old world.", $word);
		$word = str_replace("This is a creature from Urthe`s past that still exists today, although mutated or evolved somewhat.", "This is a creature from the days of the old world, although mutated or evolved somewhat.", $word);
		$word = str_replace("Urthe", "the old world", $word);
		$word = str_replace("At one time, the dead rose and walked the planet.  Some of these still roam the world", "At one time, scientists on board reanimated the dead. Some of them still roam the ship", $word);
		$word = str_replace("crashed on this planet centuries ago", "invaded the ship years ago", $word);
		$word = str_replace("A toxshot", "Medicine", $word);
		$word = str_replace("a toxshot", "medicine", $word);
		$word = str_replace("endurance", "constitution", $word);
		$word = str_replace("gasoline", "liquid fuel", $word);
		$word = str_replace("gasoline", "liquid fuel", $word);
		$word = str_replace("vary in levels from 1 to 20 and ", "", $word);
		$word = str_replace("make a strength test", "roll equal or under their strength on 1d20", $word);
		$word = str_replace("make a successful agility test", "roll equal or under their dexterity on 1d20", $word);
		$word = str_replace("successful strength test", "roll equal or under their strength on 1d20", $word);
		$word = str_replace("strength test", "roll equal or under their strength on 1d20", $word);
		$word = str_replace("make strength tests until they", "roll equal or under their strength on 1d20 to", $word);
		$word = str_replace("they may make another test every 6 hours", "they may attempt to resist the mind effect (power&nbsp;" . $level . ") every 6 hours", $word);
		$word = str_replace("can make another test to snap out of it each round", "may attempt to resist the mind effect (power&nbsp;" . $level . ") to snap out of it each round", $word);
		$word = str_replace("make an agility test", "roll equal or under their dexterity on 1d20", $word);
		$word = str_replace("where one must make a successful medicine test to thaw them out", "where it may take days to thaw them out", $word);
		$word = str_replace("make another test unless they are somehow dragged away from it", "resist the poison (strength&nbsp;" . $level . ") unless they are somehow dragged away from it", $word);
		$word = str_replace("stamina", "health", $word);
		$word = str_replace("Stamina", "health", $word);
		$word = str_replace("They also get a +2 to initiative", "They also surprise others on a 1-4", $word);
		$word = str_replace("They are fast gaining a +1 to their initiative rolls", "They are fast, surprising others on a 1-3", $word);
		$word = str_replace("They have a +1 to their initiative", "They also surprise others on a 1-3", $word);
		$word = str_replace("so it will have a +2 to initiative during the first round", "so it will surprise others on a 1-4", $word);
		$word = str_replace("They gain +3 to the first round of initiative", "They surprise others on a 1-5", $word);
		$word = str_replace("giving it +1 to initiative during the first round of combat", "allowing it to surprise others on a 1-3", $word);
		$word = str_replace("will usually gain a +3 to initiative when it emerges from under the ground, and only during that first combat round.", "will always surprise others when it emerges from under the ground.", $word);
	}
	else if ($game == "Gamma World")
	{
		if ($level < 3){$level = 3;} else if ($level > 18){$level = 18;}
		$word = str_replace("They have been given the name because they seem to eat xormite whenever they find it", "They survive by biting into, and sucking out, all of the energy from various power cells", $word);
		$word = str_replace("make a toxin defense test", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("failing a toxin defense test", "failing to resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for toxins", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("makes a defense test for toxins", "resists the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for toxin", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test against toxin", "resist the poison (strength&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for radiation", "resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test against radiation", "resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("Anyone failing a radiation defense test suffers", "Anyone failing to resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("make a defense test for energy", "resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("can make an energy defense test", "can resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("must make an energy defense test", "must resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("if they fail an energy defense test", "if they fail to resist the radiation (intensity&nbsp;" . $level . ")", $word);
		$word = str_replace("make a shock defense test", "roll equal or under their constitution on 1d20", $word);
		$word = str_replace("a defense test for shock is required or", "a roll equal or under their constitution on 1d20 or", $word);
		$word = str_replace("make a defense test for the mind", "resist the mind effect (power&nbsp;" . $level . ")", $word);
		$word = str_replace("can make another test to snap out", "can try to resist the mind effect (power&nbsp;" . $level . ") again to snap out", $word);
		$word = str_replace("make a mind defense test", "resist the mind effect (power&nbsp;" . $level . ")", $word);
		$word = str_replace("Urthe", "Earth", $word);
		$word = str_replace("At one time, the dead rose and walked the planet", "At one time, the dead rose and walked the Earth", $word);
		$word = str_replace("A toxshot", "Medicine", $word);
		$word = str_replace("a toxshot", "medicine", $word);
		$word = str_replace("endurance", "constitution", $word);
		$word = str_replace("gasoline", "liquid fuel", $word);
		$word = str_replace("gasoline", "liquid fuel", $word);
		$word = str_replace("vary in levels from 1 to 20 and ", "", $word);
		$word = str_replace("make a strength test", "roll equal or under their strength on 1d20", $word);
		$word = str_replace("make a successful agility test", "roll equal or under their dexterity on 1d20", $word);
		$word = str_replace("successful strength test", "roll equal or under their strength on 1d20", $word);
		$word = str_replace("strength test", "roll equal or under their strength on 1d20", $word);
		$word = str_replace("make strength tests until they", "roll equal or under their strength on 1d20 to", $word);
		$word = str_replace("they may make another test every 6 hours", "they may attempt to resist the mind effect (power&nbsp;" . $level . ") every 6 hours", $word);
		$word = str_replace("can make another test to snap out of it each round", "may attempt to resist the mind effect (power&nbsp;" . $level . ") to snap out of it each round", $word);
		$word = str_replace("make an agility test", "roll equal or under their dexterity on 1d20", $word);
		$word = str_replace("where one must make a successful medicine test to thaw them out", "where it may take days to thaw them out", $word);
		$word = str_replace("make another test unless they are somehow dragged away from it", "resist the poison (strength&nbsp;" . $level . ") unless they are somehow dragged away from it", $word);
		$word = str_replace("stamina", "health", $word);
		$word = str_replace("Stamina", "health", $word);
		$word = str_replace("They also get a +2 to initiative", "They also surprise others on a 1-4", $word);
		$word = str_replace("They are fast gaining a +1 to their initiative rolls", "They are fast, surprising others on a 1-3", $word);
		$word = str_replace("They have a +1 to their initiative", "They also surprise others on a 1-3", $word);
		$word = str_replace("so it will have a +2 to initiative during the first round", "so it will surprise others on a 1-4", $word);
		$word = str_replace("They gain +3 to the first round of initiative", "They surprise others on a 1-5", $word);
		$word = str_replace("giving it +1 to initiative during the first round of combat", "allowing it to surprise others on a 1-3", $word);
		$word = str_replace("will usually gain a +3 to initiative when it emerges from under the ground, and only during that first combat round.", "will always surprise others when it emerges from under the ground.", $word);
	}

	return $word;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function retroBot($word,$game)
{
	if ($game != "Broken Urthe")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$word = str_replace("xormite", "nuclear", $word);		break;
			case 1:	$word = str_replace("xormite", "petroleum", $word);		break;
			case 2:	$word = str_replace("xormite", "electricity", $word);	break;
			case 3:	$word = str_replace("xormite", "radiation", $word);		break;
			case 4:	$word = str_replace("xormite", "plutonium", $word);		break;
			case 5:	$word = str_replace("xormite", "uranium", $word);		break;
		}
	}
	if ($game = "Metamorphosis Alpha"){ $word = str_replace("petroleum", "liquid fuel", $word); }
	return $word;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAconvertArmor($valu)
{
	if ($valu > 14){$armor = "-6";}
	else if ($valu > 13){$armor = "-5";}
	else if ($valu > 12){$armor = "-4";}
	else if ($valu > 11){$armor = "-3";}
	else if ($valu > 10){$armor = "-2";}
	else if ($valu > 9){$armor = "-1";}
	else if ($valu > 8){$armor = "0";}
	else if ($valu > 7){$armor = 1;}
	else if ($valu > 6){$armor = 2;}
	else if ($valu > 5){$armor = 3;}
	else if ($valu > 4){$armor = 4;}
	else if ($valu > 3){$armor = 5;}
	else if ($valu > 2){$armor = 6;}
	else if ($valu > 1){$armor = 7;}
	else if ($valu > 0){$armor = 8;}
	else {$armor = 9;}

	return $armor;
}
function PAconvertHit($valu)
{
	if ($valu < 2){$hitter = 19;}
	else if ($valu < 3){$hitter = 18;}
	else if ($valu < 4){$hitter = 17;}
	else if ($valu < 5){$hitter = 16;}
	else if ($valu < 6){$hitter = 15;}
	else if ($valu < 7){$hitter = 14;}
	else if ($valu < 9){$hitter = 13;}
	else if ($valu < 11){$hitter = 12;}
	else if ($valu < 13){$hitter = 11;}
	else if ($valu < 15){$hitter = 10;}
	else if ($valu < 17){$hitter = 9;}
	else if ($valu < 19){$hitter = 8;}
	else if ($valu < 20){$hitter = 7;}
	else {$hitter = 6;}

	return $hitter;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function MAconvertArmor($valu)
{
	if ($valu > 14){$armor = "1";}
	else if ($valu > 13){$armor = "1";}
	else if ($valu > 12){$armor = "2";}
	else if ($valu > 11){$armor = "2";}
	else if ($valu > 10){$armor = "3";}
	else if ($valu > 9){$armor = "3";}
	else if ($valu > 8){$armor = "4";}
	else if ($valu > 7){$armor = 4;}
	else if ($valu > 6){$armor = 5;}
	else if ($valu > 5){$armor = 5;}
	else if ($valu > 4){$armor = 6;}
	else if ($valu > 3){$armor = 6;}
	else if ($valu > 2){$armor = 7;}
	else if ($valu > 1){$armor = 7;}
	else if ($valu > 0){$armor = 8;}
	else {$armor = 8;}

	return $armor;
}
function MAconvertHit($valu)
{
	if ($valu < 2){$hitter = 1;}
	else if ($valu < 3){$hitter = 2;}
	else if ($valu < 4){$hitter = 2;}
	else if ($valu < 5){$hitter = 3;}
	else if ($valu < 6){$hitter = 3;}
	else if ($valu < 7){$hitter = 4;}
	else if ($valu < 9){$hitter = 4;}
	else if ($valu < 11){$hitter = 5;}
	else if ($valu < 13){$hitter = 5;}
	else if ($valu < 15){$hitter = 6;}
	else if ($valu < 17){$hitter = 6;}
	else if ($valu < 19){$hitter = 7;}
	else if ($valu < 20){$hitter = 7;}
	else {$hitter = 8;}

	return $hitter;
}

?>